<?php

namespace App\Http\Controllers\Backend\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use App\Models\Operasional;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Keluhan;
use App\Models\Kendaraan;

class BookingController extends Controller
{
    /**
     * The Operasional instance.
     *
     * @var App\Models\Operasional
     */
    public $operasional;

    /**
     * The JadwalOperasional instance.
     *
     * @var App\Models\JadwalOperasional
     */
    public $jadwalOperasional;

    /**
     * The Booking instance.
     *
     * @var \App\Models\Booking
     */
    protected $booking;

    /**
     * The Service instance.
     *
     * @var \App\Models\Service
     */
    protected $service;
    
    /**
     * The Keluhan instance.
     *
     * @var \App\Models\Keluhan
     */
    protected $keluhan;

    /**
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * The Kendaraan instance.
     *
     * @var \App\Models\Kendaraan;
     */
    protected $kendaraan;

    /**
     * Create a new controller instance.
     */
    public function __construct(Operasional $operasional, JadwalOperasional $jadwalOperasional, Booking $booking, Service $service, Keluhan $keluhan, Kendaraan $kendaraan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->operasional = $operasional;
        $this->jadwalOperasional = $jadwalOperasional;
        $this->booking = $booking;
        $this->service = $service;
        $this->keluhan = $keluhan;
        $this->kendaraan = $kendaraan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->booking->where('pelanggan_id', $this->user->pelanggan->id)->get();
        
        return view('backend-user.booking.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwalOperasional = $this->jadwalOperasional->get();
        $services = $this->service->get();
        $user = $this->user;
        $kendaraan = $this->kendaraan->get();

        return view('backend-user.booking.create', compact('jadwalOperasional', 'services', 'user', 'kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = $this->jadwalOperasional->find($request->id_schedule);
        $operasional = $this->operasional->find($jadwal->operasional_id);
        $service = $this->service->find($request->service);
        
        if (Carbon::parse($request->time)->toTimeString() > Carbon::parse($operasional->close_on)->toTimeString()) {
            return back()->withErrors(['time' => ['Melebihi batas jam operasional']]);
        }
        $bookings = $this->booking->get();
        $booking = count($bookings);

        $code = str_pad(0 + ($booking + 1), 7, '0', STR_PAD_LEFT);

        $kendaraan = $this->kendaraan->find($request->kendaraan); 

        $this->booking->create([
            'booking_number' => $code,
            'date' => Carbon::parse($request->date),
            'time' => Carbon::parse($request->time)->toDateTimeString(),
            'no_polisi' => $kendaraan->no_polisi,
            'status' => 0,
            'jenis_pelayanan' => $request->jenis_pelayanan,
            'easyService' => $request->easyService,
            'type_kendaraan' => $kendaraan->jenis_kendaraan,
            'keterangan' => $request->keterangan,
            'pelanggan_id' => $this->user->pelanggan->id,
            'service_id' => $request->service,
            'jadwal_operasional_id' => $request->id_schedule,
        ]);

        return redirect()->route('my-booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = $this->booking->find($id);
        $services = $booking->service()->get();
        $pelanggans = $booking->pelanggan()->get();
        
        return view('backend-user.booking.show', compact('booking', 'services', 'pelanggans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        $booking = $this->booking->find($id);
        $booking->cancellation = Carbon::now()->toDateTimeString();
        $booking->save();

        return redirect(route('my-booking.index'))->with('success', __('Booking has been successfully canceled'));
    }
}

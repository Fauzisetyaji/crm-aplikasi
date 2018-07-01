<?php

namespace App\Http\Controllers\Backend\Guest;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use App\Models\Operasional;
use App\Models\Service;
use App\Models\Booking;
// use App\Notifications\BookingConfirmations;

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
     * Create a new controller instance.
     */
    public function __construct(Operasional $operasional, JadwalOperasional $jadwalOperasional, Booking $booking, Service $service)
    {
        $this->operasional = $operasional;
        $this->jadwalOperasional = $jadwalOperasional;
        $this->booking = $booking;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('guest')) {
            return redirect('login');
        }

        $guest = $request->session()->get('guest', 'default');

        $list = $this->booking->where('no_polisi', $guest->nomor_polisi)->get();
        
        return view('guest.booking.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!$request->session()->has('guest')) {
            return redirect('login');
        }

        $jadwalOperasional = $this->jadwalOperasional->get();
        $services = $this->service->get();
        $guest = $request->session()->get('guest', 'default');

        return view('guest.booking.create', compact('jadwalOperasional', 'services', 'guest'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->session()->has('guest')) {
            return redirect('login');
        }

        $jadwal = $this->jadwalOperasional->find($request->id_schedule);
        $operasional = $this->operasional->find($jadwal->operasional_id);
        $service = $this->service->find($request->service);
        
        if (Carbon::parse($request->time)->toTimeString() > Carbon::parse($operasional->close_on)->toTimeString()) {
            return back()->withErrors(['time' => ['Melebihi batas jam operasional']]);
        }
        $bookings = $this->booking->get();
        $booking = count($bookings);

        $code = str_pad(0 + ($booking + 1), 7, '0', STR_PAD_LEFT);
        $guest = $request->session()->get('guest', 'default');

        $booking = $this->booking->create([
            'booking_number' => $code,
            'date' => Carbon::parse($request->date),
            'time' => Carbon::parse($request->time)->toDateTimeString(),
            'no_polisi' => $guest->nomor_polisi,
            'status' => 0,
            'jenis_pelayanan' => $request->jenis_pelayanan,
            'easyService' => $request->easyService,
            'type_kendaraan' => $request->type_kendaraan,
            'keterangan' => $request->keterangan,
            'service_id' => $request->service,
            'jadwal_operasional_id' => $request->id_schedule,
        ]);

        return redirect()->route('guest-booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if (!$request->session()->has('guest')) {
            return redirect('login');
        }

        $booking = $this->booking->find($id);
        $services = $booking->service()->get();
        $guest = $request->session()->get('guest', 'default');
        
        return view('guest.booking.show', compact('booking', 'services', 'guest'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$request->session()->has('guest')) {
            return redirect('login');
        }

        $booking = $this->booking->find($id);
        $booking->cancellation = Carbon::now()->toDateTimeString();
        $booking->save();

        return redirect(route('guest-booking.index'))->with('success', __('Booking has been successfully canceled'));
    }
}

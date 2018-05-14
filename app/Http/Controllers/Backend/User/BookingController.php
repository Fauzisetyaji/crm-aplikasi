<?php

namespace App\Http\Controllers\Backend\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Keluhan;

class BookingController extends Controller
{
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
     * Create a new controller instance.
     */
    public function __construct(JadwalOperasional $jadwalOperasional, Booking $booking, Service $service, Keluhan $keluhan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->jadwalOperasional = $jadwalOperasional;
        $this->booking = $booking;
        $this->service = $service;
        $this->keluhan = $keluhan;
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

        return view('backend-user.booking.create', compact('jadwalOperasional', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->booking->create([
            'date' => Carbon::parse($request->date),
            'time' => Carbon::parse($request->time)->toDateTimeString(),
            'status' => 0,
            'jenis_service' => $request->jenis_service,
            'easyService' => $request->easyService,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
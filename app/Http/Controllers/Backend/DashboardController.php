<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Pelanggan;

class DashboardController extends Controller
{
    /**
     * The Service instance.
     *
     * @var \App\Models\Service
     */
    protected $service;

    /**
     * The Booking instance.
     *
     * @var \App\Models\Booking
     */
    protected $booking;

    /**
     * The Pelanggan instance.
     *
     * @var \App\Models\Pelanggan
     */
    protected $pelanggan;

    /**
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * constructor
     *
     */
    public function __construct(Service $service, Pelanggan $pelanggan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->service = $service;
        $this->pelanggan = $pelanggan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = $this->service->get();
        $pelanggans = $this->pelanggan->get();
        foreach ($services as $key => $value) {
            $value->booked = count($value->bookings);
        }
        
        return view('backend.index', compact('services', 'pelanggans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Keluhan;
use App\Models\Pelanggan;
use App\Notifications\BookingConfirmations;

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
     * The Pelanggan instance.
     *
     * @var \App\Models\Pelanggan
     */
    protected $pelanggan;

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
        $list = $this->booking->orderBy('created_at', 'asc')->get();
        
        return view('backend.booking.index', [ 'list' => $list ]);
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
        
        return view('backend.booking.show', compact('booking', 'services', 'pelanggans'));
    }

    /**
     * Confirm the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm(Request $request, $id)
    {
        $booking = $this->booking->find($id);

        $service = $this->service->find($booking->service_id);
        
        $booking->status = true;
        $booking->save();

        $pelanggan = $booking->pelanggan()->first();
        if ($pelanggan) {
            $poin = $pelanggan->jml_poin;

            $pelanggan->update([
                'jml_poin' => (int)$poin + (int)$service->poin
            ]);

            $booking->pelanggan->user->notify(new BookingConfirmations($booking, $booking->pelanggan->user->id));
        }

        return redirect(route('booking.index'))->with('success', __('Booking has been successfully confirm'));
    }

    /**
     * Cancel the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        $booking = $this->booking->find($id);
        $booking->cancellation = Carbon::now()->toDateTimeString();
        $booking->save();

        if ($booking->pelanggan()->first()) {
            $booking->pelanggan->user->notify(new BookingConfirmations($booking, $booking->pelanggan->user->id));
        }


        return redirect(route('booking.index'))->with('success', __('Booking has been successfully canceled'));
    }
}

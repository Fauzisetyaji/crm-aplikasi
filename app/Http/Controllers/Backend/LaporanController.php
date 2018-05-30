<?php

namespace App\Http\Controllers\Backend;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Pelanggan;

class LaporanController extends Controller
{
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
    public function __construct(Booking $booking, Service $service)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->booking = $booking;
        $this->service = $service;
    }
    
    /**
     * get laporan booking
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanBooking(Request $request)
    {
        $periodes = [];
        $data = [];

        $dateStart = \Carbon\Carbon::parse('2018-01-31');
        $dateEnd = \Carbon\Carbon::parse('2018-12-31');

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->whereMonth('date', $date->month)->where('status', true)->get();
        }
        
        $view = view('laporan.booking')->with([
            'data' => $data,
            'periodes' => $periodes
        ])->render();

        return $this->sendResponse($request, $view);
    }

    /**
     * get laporan service
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanService(Request $request)
    {
        $periodes = [];
        $data = [];

        $dateStart = \Carbon\Carbon::parse('2018-01-31');
        $dateEnd = \Carbon\Carbon::parse('2018-12-31');

        $services = $this->service->with('bookings')->get();

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $services = $this->service->with('bookings')->get();
        }
        
        $view = view('laporan.pelanggan')->with([
            'data' => $data,
            'services' => $services,
            'periodes' => $periodes
        ])->render();

        return $this->sendResponse($request, $view);
    }

    /**
     * get laporan pelanggan
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanPelanggan(Request $request)
    {
        $periodes = [];
        $data = [];

        $dateStart = \Carbon\Carbon::parse('2018-01-31');
        $dateEnd = \Carbon\Carbon::parse('2018-12-31');

        $services = $this->service->with('bookings')->get();

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $services = $this->service->with('bookings')->get();
        }
        
        $view = view('laporan.pelanggan')->with([
            'data' => $data,
            'services' => $services,
            'periodes' => $periodes
        ])->render();
        dd($data);
        return $this->sendResponse($request, $view);
    }

    /**
     * send response
     *
     * @param Request $request
     * @param string $view
     * @return Response
     */
    protected function sendResponse(Request $request, $view)
    {
        
        return $this->generatePdf($view);
        
    }

    /**
     * generate pdf
     *
     * @param string $view
     * @return pdf
     */
    protected function generatePdf($view)
    {
        $pdf = PDF::loadHTML($view);

        $pdf->setPaper('A4', 'portrait');

        return $pdf->stream();
    }
}

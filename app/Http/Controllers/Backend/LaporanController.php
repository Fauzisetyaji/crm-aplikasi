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
    public function __construct(Booking $booking, Service $service, Pelanggan $pelanggan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->booking = $booking;
        $this->service = $service;
        $this->pelanggan = $pelanggan;
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

        if (is_null($request->year)) {
            $year = Carbon::now()->setTimezone('Asia/Bangkok');
        } else {
            $year = Carbon::parse($request->year);
        }

        $dateStart = Carbon::parse('2018-01-31');
        $dateEnd = Carbon::parse('2018-12-31');

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->where('status', true)
                                    ->whereMonth('date', $date->month)
                                    ->whereYear('date', $year->year)
                                    ->get();
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
        $dataBooking = [];

        if (is_null($request->year)) {
            $year = Carbon::now()->setTimezone('Asia/Bangkok');
        } else {
            $year = Carbon::parse($request->year);
        }

        $dateStart = Carbon::parse('2018-01-31');
        $dateEnd = Carbon::parse('2018-12-31');

        $services = $this->service->with('bookings')->get();

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $services = $this->service->with('bookings')->get();
            $dataBooking[] = $this->booking->where('status', true)
                                            ->whereMonth('date', $date->month)
                                            ->whereYear('date', $year->year)
                                            ->with('service')->get();
        }
        
        $view = view('laporan.service')->with([
            'data' => $data,
            'dataBooking' => $dataBooking,
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
        $pelanggans = [];

        if (is_null($request->year)) {
            $year = Carbon::now()->setTimezone('Asia/Bangkok');
        } else {
            $year = Carbon::parse($request->year);
        }

        $dateStart = Carbon::parse('2018-01-31');
        $dateEnd = Carbon::parse('2018-12-31');

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->where('status', true)
                                    ->whereMonth('date', $date->month)
                                    ->whereYear('date', $year->year)
                                    ->with('pelanggan')->get();
        }

        $pelanggans = $this->pelanggan->get();
        
        $view = view('laporan.pelanggan')->with([
            'data' => $data,
            'periodes' => $periodes,
            'pelanggans' => $pelanggans
        ])->render();

        for ($i=0; $i < count($data); $i++) { 
                // dump($data[$i]);
            for ($j=0; $j <= $i; $j++) {
                if (isset($data[$i][$j])) {
                    $data[$i][$j]->pelanggans = $this->pelanggan->find($data[$i][$j]->pelanggan->id);
                }
            }
            
        }

        return $this->sendResponse($request, $view);
    }

    /**
     * Get laporan pelanggan Baru
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanPelangganBaru(Request $request)
    {
        $periodes = [];
        $data = [];

        if (is_null($request->year)) {
            $year = Carbon::now()->setTimezone('Asia/Bangkok');
        } else {
            $year = Carbon::parse($request->year);
        }

        $dateStart = Carbon::parse('2018-01-31');
        $dateEnd = Carbon::parse('2018-12-31');

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->pelanggan->whereMonth('created_at', $date->month)
                                        ->whereYear('created_at', $year->year)
                                        ->get();
        }
        
        $view = view('laporan.pelanggan-baru')->with([
            'data' => $data,
            'periodes' => $periodes,
        ])->render();

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

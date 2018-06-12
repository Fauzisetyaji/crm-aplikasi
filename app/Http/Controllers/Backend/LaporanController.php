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
use App\Models\Keluhan;

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
     * The Keluhan instance
     *
     * @var \App\Models\Keluhan
     */
    public $keluhan;

    /**
     * Create a new controller instance.
     */
    public function __construct(Booking $booking, Service $service, Pelanggan $pelanggan, Keluhan $keluhan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->booking = $booking;
        $this->service = $service;
        $this->pelanggan = $pelanggan;
        $this->keluhan = $keluhan;
    }

    /**
     * view pilih periode tahun
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        
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

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }
        
        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->where('status', true)
                                    ->whereMonth('date', $date->month)
                                    ->whereYear('date', $year->year)
                                    ->get();
        }

        if ($request->has('return')) {
            if ($request->return === 'pdf') {

                $view = view('laporan.booking')->with([
                    'data' => $data,
                    'periodes' => $periodes
                ])->render();

                return $this->sendResponse($request, $view);
            }
        } else {
            return view('laporan.select-periode');
        }
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

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }

        $services = $this->service->with('bookings')->get();

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $services = $this->service->with('bookings')->get();
            $dataBooking[] = $this->booking->where('status', true)
                                            ->whereMonth('date', $date->month)
                                            ->whereYear('date', $year->year)
                                            ->with('service')->get();
        }
        
        if ($request->has('return')) {
            if ($request->return === 'pdf') {
                $view = view('laporan.service')->with([
                    'data' => $data,
                    'dataBooking' => $dataBooking,
                    'services' => $services,
                    'periodes' => $periodes
                ])->render();

                return $this->sendResponse($request, $view);
            }
        } else {
            return view('laporan.select-periode');
        }
    }

    /**
     * get laporan keluhan
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanKeluhan(Request $request)
    {
        $periodes = [];
        $data = [];
        $pelanggans = [];

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->keluhan->where('status', true)
                                    ->whereMonth('created_at', $date->month)
                                    ->whereYear('created_at', $year->year)
                                    ->with('pelanggan')->get();
        }

        if ($request->has('return')) {
            if ($request->return === 'pdf') {
                $view = view('laporan.keluhan')->with([
                    'data' => $data,
                    'periodes' => $periodes,
                ])->render();

                return $this->sendResponse($request, $view);
            }
        } else {
            return view('laporan.select-periode');
        }
    }

    /**
     * get laporan poin pelanggan
     *
     * @param Request $request
     * @return mixed
     */
    public function getLaporanPoin(Request $request)
    {
        $periodes = [];
        $data = [];
        $pelanggans = [];

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->where('status', true)
                                    ->whereMonth('date', $date->month)
                                    ->whereYear('date', $year->year)
                                    ->with('pelanggan')->get();
        }

        $pelanggans = $this->pelanggan->get();

        if ($request->has('return')) {
            if ($request->return === 'pdf') {
                $view = view('laporan.poin')->with([
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
        } else {
            return view('laporan.select-periode');
        }
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

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->booking->where('status', true)
                                    ->whereMonth('date', $date->month)
                                    ->whereYear('date', $year->year)
                                    ->with('pelanggan')->get();
        }

        $pelanggans = $this->pelanggan->get();

        if ($request->has('return')) {
            if ($request->return === 'pdf') {
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
        } else {
            return view('laporan.select-periode');
        }
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

        $year = Carbon::now()->setTimezone('Asia/Bangkok');

        $dateStart = Carbon::now()->startOfYear();
        $dateEnd = Carbon::now()->endOfYear();
        if ($request->has('periode')) {
            $year = Carbon::create($request->periode);
            $dateStart = Carbon::create($request->periode)->startOfYear();
            $dateEnd = Carbon::create($request->periode)->endOfYear();
        }

        for($date = $dateStart; $date->lte($dateEnd); $date->addMonthNoOverflow()){
            $periodes[] = $date->format('F');
            $data[] = $this->pelanggan->whereMonth('created_at', $date->month)
                                        ->whereYear('created_at', $year->year)
                                        ->get();
        }

        if ($request->has('return')) {
            if ($request->return === 'pdf') {
                $view = view('laporan.pelanggan-baru')->with([
                    'data' => $data,
                    'periodes' => $periodes,
                ])->render();
                
                return $this->sendResponse($request, $view);
            }
        } else {
            return view('laporan.select-periode');
        }
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

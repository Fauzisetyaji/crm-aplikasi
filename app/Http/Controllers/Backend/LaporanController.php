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
        $bookings = $this->booking->get();

        $view = view('laporan.booking')->with([
            'bookings' => $bookings
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
        if ($request->has('return')) {
            if ($request->return === 'pdf') {
                return $this->generatePdf($view);
            }

            if ($request->return === 'print') {
                $view .= '<script>window.print()</script>';
            }
        }

        return $view;
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

        $pdf->setPaper('A4');

        return $pdf->stream();
    }
}

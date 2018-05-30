<?php

namespace App\Http\Controllers\Backend\User;

use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Mekanik;

class HistoryController extends Controller
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
     * The Mekanik instance.
     *
     * @var \App\Models\Mekanik
     */
    protected $mekanik;

    /**
     * The Saran instance.
     *
     * @var \App\Models\Mekanik
     */
    protected $saran;

    /**
     * Create a new controller instance.
     */
    public function __construct(Booking $booking, Service $service, Mekanik $mekanik)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->booking = $booking;
        $this->service = $service;
        $this->mekanik = $mekanik;
        $this->saran = ['Tidak ada saran perbaikan', 'Service Berkala Internal', 'Service Berkala Eksternal'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->booking->where('pelanggan_id', $this->user->pelanggan->id)->get();
        $mekaniks = $this->mekanik->get();
        $saran = $this->saran;
        
        return view('backend-user.history.index', compact('list', 'mekaniks', 'saran'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cetak(Request $request, $id)
    {
        $booking = $this->booking->find($id);
        $mekaniks = $this->mekanik->get();
        $saran = $this->saran;
        
        $view = view('backend-user.history.laporan')->with([
            'booking' => $booking,
            'mekaniks' => $mekaniks,
            'saran' => $saran,
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

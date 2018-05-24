<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JadwalOperasional;
use App\Models\Operasional;
use App\Models\Service;
use App\Models\Mekanik;

class JadwalOperasionalController extends Controller
{
    /**
     * The JadwalOperasional instance.
     *
     * @var App\Models\JadwalOperasional
     */
    public $jadwalOperasional;

    /**
     * The Operasional instance.
     *
     * @var \App\Models\Operasional
     */
    protected $operasional;

    /**
     * The Service instance.
     *
     * @var \App\Models\Service
     */
    protected $service;

    /**
     * The Mekanik instance.
     *
     * @var \App\Models\Mekanik
     */
    protected $mekanik;

    /**
     * Create a new controller instance.
     */
    public function __construct(JadwalOperasional $jadwalOperasional, Operasional $operasional, Service $service, Mekanik $mekanik)
    {
        $this->jadwalOperasional = $jadwalOperasional;
        $this->operasional = $operasional;
        $this->service = $service;
        $this->mekanik = $mekanik;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->jadwalOperasional->orderBy('created_at', 'asc')->get();

        return view('backend.master.jadwal-operasional.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->service->get();
        $mekaniks = $this->mekanik->get();

        return view('backend.master.jadwal-operasional.create', ['services' => $services, 'mekaniks' => $mekaniks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $starts_on = Carbon::parse($request->starts_on);
        $ends_on = Carbon::parse($request->ends_on);
        $length_in_days = $ends_on->diffInDays($starts_on);

        $this->operasional->create([
            "operasional_id" => $request->operasional_id,
            "service_id" => $request->service_id,
            "mekanik_id" => $request->mekanik_id,
            "date" => $request->date,
            "service_count" => $request->service_count,
            "booking_count" => $request->booking_count,
        ]);

        return redirect()->route('jadwal-operasional.index');
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
    public function destroy(Request $request, $id)
    {
        $jadwalOperasional = $this->jadwalOperasional->find($id);

        $jadwalOperasional->delete();

        return redirect(route('jadwal-operasional.index'))->with('success', __('Jadwal Operasional has been successfully deleted'));
    }
}

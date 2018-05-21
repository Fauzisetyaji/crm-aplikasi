<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Operasional;
use App\Models\JadwalOperasional;
use App\Models\Service;
use App\Models\Mekanik;

class OperasionalController extends Controller
{
    /**
     * The Operasional instance.
     *
     * @var \App\Models\Operasional
     */
    protected $operasional;

    /**
     * The JadwalOperasional instance.
     *
     * @var App\Models\JadwalOperasional
     */
    public $jadwalOperasional;

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
    public function __construct(Operasional $operasional, JadwalOperasional $jadwalOperasional, Service $service, Mekanik $mekanik)
    {
        $this->operasional = $operasional;
        $this->jadwalOperasional = $jadwalOperasional;
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
        $list = $this->operasional->orderBy('created_at', 'asc')->get();
        $jadwalOperasional = $this->jadwalOperasional->orderBy('created_at', 'asc')->get();

        return view('backend.master.operasional.index', compact('list', 'jadwalOperasional'));
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

        return view('backend.master.operasional.create', compact('services', 'mekaniks'));
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
        $ends_on = null;
        if ($request->ends_on) {
            $ends_on = Carbon::parse($request->ends_on);
        }

        $length_in_days = 0;
        if ($request->ends_on) {
            $length_in_days = $ends_on->diffInDays($starts_on);
        }

        $operasional = $this->operasional->create([
            "name" => $request->name,
            "starts_on" => $starts_on,
            "ends_on" => $ends_on,
            "open_on" => Carbon::parse($request->open_on)->toDateTimeString(),
            "close_on" => Carbon::parse($request->close_on)->toDateTimeString(),
            "length_in_days" => $length_in_days,
        ]);

        $this->jadwalOperasional->create([
            "operasional_id" => $operasional->id,
            // "service_id" => $request->service_id,
            // "mekanik_id" => $request->mekanik_id,
            "date" => $starts_on,
            "service_count" => $request->service_count,
            "booking_count" => $request->booking_count,
        ]);

        for ($i=0; $i < $length_in_days; $i++) {
            $this->jadwalOperasional->create([
                "operasional_id" => $operasional->id,
                "date" => $starts_on->addDays(1),
                "service_count" => $request->service_count,
                "booking_count" => $request->booking_count,
            ]);
        }

        return redirect()->route('operasional.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $operasional = $this->operasional->find($id);
        $jadwalOperasional = $this->jadwalOperasional->where('operasional_id', $operasional->id)->get();
        $services = $this->service->get();
        $mekaniks = $this->mekanik->get();
        
        return view('backend.master.operasional.show', compact('operasional', 'jadwalOperasional', 'services', 'mekaniks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operasional = $this->operasional->find($id);

        $fdate = Carbon::parse($operasional->starts_on);
        $tdate = Carbon::now();
        $diffDates = 0 - ($tdate->diff($fdate)->days + 1);
        
        return view('backend.master.operasional.edit', ['operasional' => $operasional, 'diffDates' => $diffDates]);
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
        $request->merge(['starts_on' => Carbon::parse($request->starts_on)]);
        $request->merge(['ends_on' => Carbon::parse($request->ends_on)]);
        $request->merge(['open_on' => Carbon::parse($request->open_on)->toDateTimeString()]);
        $request->merge(['close_on' => Carbon::parse($request->close_on)->toDateTimeString()]);

        $operasional = $this->operasional->find($id);
        $operasional->update($request->all());

        return redirect(route('operasional.index'))->with('success', __('Operasional has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $operasional = $this->operasional->find($id);

        $operasional->jadwal()->delete();

        $operasional->delete();

        return redirect(route('operasional.index'))->with('success', __('Operasional has been successfully deleted'));
    }
}

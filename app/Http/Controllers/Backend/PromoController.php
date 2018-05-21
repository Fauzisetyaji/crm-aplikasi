<?php

namespace App\Http\Controllers\Backend;

use App\Notifications\PromoPelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promo;
use App\Models\Service;
use App\Models\Pelanggan;

class PromoController extends Controller
{
    /**
     * The Promo instance.
     *
     * @var \App\Models\Promo
     */
    protected $promo;

    /**
     * The Service instance.
     *
     * @var \App\Models\Service
     */
    protected $service;

    /**
     * The Pelanggan instance.
     *
     * @var \App\Models\Pelanggan
     */
    protected $pelanggan;

    /**
     * Create a new controller instance.
     */
    public function __construct(Promo $promo, Service $service, Pelanggan $pelanggan)
    {
        $this->promo = $promo;
        $this->service = $service;
        $this->pelanggan = $pelanggan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->promo->where('type', 'pelanggan')->orderBy('created_at', 'asc')->get();

        return view('backend.promo.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->service->get();
        $pelanggans = $this->pelanggan->get();

        return view('backend.promo.create', compact('services', 'pelanggans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->pelanggan->findOrFail($request->pelanggan_id)->user;
        
        $promo = $this->promo->create($request->all());

        if ($promo) {
            $user->notify(new PromoPelanggan($user));
        }

        return redirect()->route('promo.index')->with('success', __('Promo berhasil ditambahkan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $services = $this->service->get();
        $pelanggans = $this->pelanggan->get();
        $promo = $this->promo->find($id);

        return view('backend.promo.edit', compact('services', 'pelanggans', 'promo'));
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
        $user = $this->pelanggan->findOrFail($request->pelanggan_id)->user;

        $promo = $this->promo->find($id);
        $promo->update($request->all());

        if ($promo) {
            $user->notify(new PromoPelanggan($user));
        }

        return redirect(route('promo.index'))->with('success', __('Promo berhasil diupdate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $promo = $this->promo->find($id);

        $promo->delete();

        return redirect(route('promo.index'))->with('success', __('Promo berhasil dihapus'));
    }
}

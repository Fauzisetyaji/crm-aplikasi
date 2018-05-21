<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promo;

class PromoNonPelangganController extends Controller
{
	    /**
     * The Promo instance.
     *
     * @var \App\Models\Promo
     */
    protected $promo;

    /**
     * Create a new controller instance.
     */
    public function __construct(Promo $promo)
    {
        $this->promo = $promo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->promo->where('type', 'non-pelanggan')->orderBy('created_at', 'asc')->get();

        return view('backend.promo-non.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.promo-non.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['type' => 'non-pelanggan']);

        $this->promo->create($request->all());

        return redirect()->route('promo-non-pelanggan.index')->with('success', __('Promo Non Pelanggan berhasil ditambahkan'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $promo = $this->promo->find($id);

        return view('backend.promo-non.edit', compact('promo'));
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
        $promo = $this->promo->find($id);
        $promo->update($request->all());

        return redirect(route('promo-non-pelanggan.index'))->with('success', __('Promo Non Pelanggan berhasil diupdate'));
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

        return redirect(route('promo-non-pelanggan.index'))->with('success', __('Promo Non Pelanggan berhasil dihapus'));
    }
}

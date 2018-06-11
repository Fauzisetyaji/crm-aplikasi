<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Keluhan;

class KeluhanController extends Controller
{
    /**
     * The Keluhan instance.
     *
     * @var \App\Models\Keluhan
     */
    protected $keluhan;

    /**
     * Create a new controller instance.
     */
    public function __construct(Keluhan $keluhan)
    {
        $this->keluhan = $keluhan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->keluhan->orderBy('created_at', 'asc')->get();

        return view('backend.keluhan.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $keluhan = $this->keluhan->find($id);

        return view('backend.keluhan.response', compact('keluhan'));
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
        $keluhan = $this->keluhan->find($id);

        $keluhan->update([
            'status' => true,
            'tanggapan' => $request->tanggapan,
        ]);

        return redirect(route('keluhan.index'))->with('success', __('Keluhan berhasil ditanggapi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $keluhan = $this->keluhan->find($id);

        $keluhan->delete();

        return redirect(route('keluhan.index'))->with('success', __('Keluhan has been successfully deleted'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pelanggan;

class PelangganController extends Controller
{

    /**
     * The Pelanggan instance.
     *
     * @var \App\Models\Pelanggan
     */
    protected $pelanggan;

    /**
     * Create a new controller instance.
     */
    public function __construct(Pelanggan $pelanggan)
    {
        $this->pelanggan = $pelanggan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->pelanggan->with('user')->orderBy('created_at', 'asc')->get();

        return view('backend.master.pelanggan.index', [ 'list' => $list ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pelanggan = $this->pelanggan->find($id);
        
        $pelanggan->delete();
        $pelanggan->user->delete();

        return redirect(route('pelanggan.index'))->with('success', __('Pelanggan has been successfully deleted'));
    }
}

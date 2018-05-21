<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mekanik;

class MekanikController extends Controller
{
    /**
     * The Mekanik instance.
     *
     * @var \App\Models\Mekanik
     */
    protected $mekanik;

    /**
     * Create a new controller instance.
     */
    public function __construct(Mekanik $mekanik)
    {
        $this->mekanik = $mekanik;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->mekanik->orderBy('created_at', 'asc')->get();
        
        return view('backend.master.mekanik.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.master.mekanik.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->mekanik->create([
            'nm_mekanik' => $request->nm_mekanik,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp
        ]);

        return redirect()->route('mekanik.index');
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
        $mekanik = $this->mekanik->find($id);

        return view('backend.master.mekanik.edit', ['mekanik' => $mekanik]);
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
        $mekanik = $this->mekanik->find($id);
        $mekanik->update($request->all());

        return redirect(route('mekanik.index'))->with('success', __('Mekanik has been successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $mekanik = $this->mekanik->find($id);

        $mekanik->delete();

        return redirect(route('mekanik.index'))->with('success', __('Mekanik has been successfully deleted'));
    }
}

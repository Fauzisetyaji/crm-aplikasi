<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimoni;

class TestimoniController extends Controller
{
    /**
     * The Testimoni instance.
     *
     * @var \App\Models\Testimoni
     */
    protected $testimoni;

    /**
     * Create a new controller instance.
     */
    public function __construct(Testimoni $testimoni)
    {
        $this->testimoni = $testimoni;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = $this->testimoni->orderBy('created_at', 'asc')->get();

        return view('backend.testimoni.index', [ 'list' => $list ]);
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
        $testimoni = $this->testimoni->find($id);

        $testimoni->delete();

        return redirect(route('testimoni.index'))->with('success', __('Testimoni has been successfully deleted'));
    }
}

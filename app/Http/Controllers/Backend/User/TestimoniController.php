<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct(Testimoni $testimoni)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

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

        return view('backend-user.testimoni.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-user.testimoni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->testimoni->create([
            'detail' => $request->detail,
            'pelanggan_id' => $this->user->pelanggan->id
        ]);

        return redirect()->route('my-testimoni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = $this->testimoni->find($id);

        $testimoni->delete();

        return redirect(route('my-testimoni.index'))->with('success', __('Testimoni berhasil dihapus'));
    }
}

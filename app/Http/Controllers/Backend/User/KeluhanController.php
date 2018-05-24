<?php

namespace App\Http\Controllers\Backend\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * Create a new controller instance.
     */
    public function __construct(Keluhan $keluhan)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

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

        return view('backend-user.keluhan.index', [ 'list' => $list ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-user.keluhan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->keluhan->create([
            'detail' => $request->detail,
            'status' => false,
            'pelanggan_id' => $this->user->pelanggan->id,
            'tanggapan' => null
        ]);

        return redirect(route('my-keluhan.index'))->with('success', __('Keluhan berhasil dibuat'));
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

        return redirect(route('my-keluhan.index'))->with('success', __('Keluhan berhasil dihapus'));
    }
}

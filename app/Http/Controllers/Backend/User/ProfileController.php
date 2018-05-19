<?php

namespace App\Http\Controllers\Backend\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reward;
use App\Models\Claim;

class ProfileController extends Controller
{
    /**
     * The User instance.
     *
     * @var \Illuminate\Support\Facades\Auth;
     */
    protected $user;

    /**
     * The Reward instance.
     *
     * @var App\Models\Reward
     */
    public $reward;

    /**
     * The Claim instance.
     *
     * @var App\Models\Claim
     */
    public $claim;

    /**
     * Create a new controller instance.
     */
    public function __construct(Reward $reward, Claim $claim)
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            return $next($request);
        });

        $this->middleware('auth');

        $this->reward = $reward;
        $this->claim = $claim;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user;
        $rewards = $this->reward->get();
        $claims = $this->claim->where('pelanggan_id', $user->pelanggan->id)->get();
        
        return view('backend-user.poin.index', compact('user', 'rewards', 'claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    /**
     * Claim the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function claim(Request $request, $id)
    {
        $rewards = $this->reward->get();

        $code = str_pad(0+count($rewards), 10, '0', STR_PAD_LEFT);
    
        $reward = $this->reward->findOrFail($id);
        $pelanggan = $this->user->pelanggan;
        
        if ($pelanggan->jml_poin < $reward->poin) {
            return back()->withErrors(['claim' => ['Poin Anda Kurang Mencukupi']]);
        }
        
        $claim = $this->claim->create([
            'no_claim' => $code,
            'tgl_claim' => Carbon::now(),
            'point_potong' => $reward->poin,
            'status' => 0,
            'reward_id' => $id,
            'pelanggan_id' => $pelanggan->id
        ]);
        $count = $reward->count - 1;
        $poin = $pelanggan->jml_poin - $reward->poin;

        $reward->update([
            'count' => $count
        ]);

        $pelanggan->update([
            'jml_poin' => $poin
        ]);

        return redirect(route('my-profile.index'))->with('success', __('Claim berhasil'));
    }
}
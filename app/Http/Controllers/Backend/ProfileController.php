<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Validator;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ubah(Request $request)
    {
        $user = $this->user;
        
        return view('backend.profile', ['user' => $user]);
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
        $this->user->update([
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect(route('profile.ubah'))->with('success', __('Profile Anda berhasil di ubah'));
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $this->user->update([
            'password' => bcrypt($request->password),
        ]);        

        return redirect(route('profile.ubah'))->with('success-2', __('Password Anda berhasil di ubah'));
    }
}

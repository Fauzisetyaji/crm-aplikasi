<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guest(Request $request) {

        if ($request->session()->has('guest')) {
            return redirect('guest/dashboard');
        }

        return view('auth.login-guest');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'userid' => 'required',
            'password' => 'required'
        ]);
        
        /**
        * If the class is using the ThrottlesLogins trait, we can automatically throttle
        * the login attempts for this application. We'll key this by the username and
        * the IP address of the client making these requests into this application.
        */
        if($this->hasTooManyLoginAttempts($request)) {
            
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        $credentials = $this->credentials($request);
        
        if($this->guard()->attempt($credentials, $request->has('remember'))) {
            if (Auth::user()->roles === 'staff') {
                $this->redirectTo = '/admin/dashboard';
            }

            return $this->sendLoginResponse($request);
        }
        /**
        * If the login attempt was unsuccessful we will increment the number of attempts
        * to login and redirect the user back to the login form. Of course, when this
        * user surpasses their maximum number of attempts they will get locked out.
        */
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function credentials(Request $request) {
        
        $key = 'username';
        if(filter_var($request->userid, FILTER_VALIDATE_EMAIL)) {
            $key = 'email';
        }
        
        return [
            $key => $request->userid,
            'password' => $request->password,
        ];
    }
}

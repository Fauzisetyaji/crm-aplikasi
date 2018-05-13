<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\Registered;
use App\Models\User;
use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $this->createOwner($user, $data);

        $user->notify(new Registered($user));

        return $user;
    }

    /**
     * create user owner
     *
     * @param Request $request
     * @return json
     */
    public function createOwner($user, $data)
    {
        $pelanggan = $this->createPelanggan([
            'nm_pelanggan' => $data['nm_pelanggan'],
            'alamat' => $data['alamat'],
            'no_tlp' => $data['no_tlp'],
            'jml_poin' => null,
            'user_id' => $user->id
        ]);

        return $pelanggan;
    }

    /**
     * create pelanggan
     *
     * @param array $data
     * @return Pelanggan
     */
    protected function createPelanggan(array $data)
    {
        return Pelanggan::create($data);
    }


}

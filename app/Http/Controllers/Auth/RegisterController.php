<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Notifications\Registered;
use App\Models\User;
use App\Models\Guest;
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
     * The Pelanggan instance.
     *
     * @var \App\Models\Pelanggan
     */
    protected $pelanggan;

    /**
     * The Guest instance model
     *
     * @var \App\Models\Guest
     */
    public $guest;

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
    public function __construct(Pelanggan $pelanggan, Guest $guest)
    {
        $this->middleware('guest');
        $this->pelanggan = $pelanggan;
        $this->guest = $guest;
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
        $pelanggans = $this->pelanggan->get();

        $code = str_pad(1+count($pelanggans), 10, '0', STR_PAD_LEFT);

        $pelanggan = $this->createPelanggan([
            'kode_pelanggan' => $code,
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

    public function guest(Request $request)
    {
        $guest = $this->guest->create([
            'email' => $request->email,
            'nama' => $request->nama_guest,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            'nomor_polisi' => $request->nopol,
            'type_kendaraan' => $request->type_kendaraan
        ]);

        $request->session()->put('guest', $guest);

        return redirect('guest/dashboard');
    }


}

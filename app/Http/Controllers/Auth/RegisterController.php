<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'             => ['required', 'string', 'max:255', 'unique:users'],
            'nationality_no'    => ['required', 'string', 'max:255'],
            'nationality'       => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'post_code'         => ['required', 'string', 'max:255'],
            'organiation'       => ['required', 'string', 'max:255'],
            'job_title'         => ['required', 'string', 'max:255'],
            'comments'          => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $password = $data['first_name'] .'_'. $data['last_name'] .'1234';
        return User::create([
            'first_name'    => $data['first_name'],
            'last_name'     => $data['last_name'],
            'email'         => $data['email'],
            'phone'         => $data['phone'],
            'password'      => Hash::make($password),
            'nationality_no'=> $data['nationality'],
            'nationality'   => $data['nationality'],
            'address'       => $data['address'],
            'city'          => $data['city'],
            'country'       => $data['country'],
            'post_code'     => $data['post_code'],
            'organiation'   => $data['organiation'],
            'job_title'     => $data['job_title'],
            'comments'      => $data['comments'],
        ]);
    }
}

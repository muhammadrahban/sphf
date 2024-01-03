<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


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
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'nationality_no'    => ['required', 'string', 'max:255'],
            'nationality'       => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'post_code'         => ['required', 'string', 'max:255'],
            'organiation'       => ['required', 'string', 'max:255'],
            'job_title'         => ['required', 'string', 'max:255'],
            'comments'          => ['sometimes', 'max:255'],
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
        $is_anonymous = isset($data['is_anonymously']) ? true : false;
        $is_individual = isset($data['is_individual']) ? true : false;
        $is_company   = isset($data['is_company']) ? true : false;
        $password = $data['first_name'] . '_' . $data['last_name'] . '1234';
        $user = User::create([
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
            'password'          => Hash::make($data['password']),
            'nationality_no'    => $data['nationality'],
            'nationality'       => $data['nationality'],
            'address'           => $data['address'],
            'city'              => $data['city'],
            'country'           => $data['country'],
            'post_code'         => $data['post_code'],
            'organiation'       => $data['organiation'],
            'job_title'         => $data['job_title'],
            'comments'          => $data['comments'],
            'is_anonymously'    => $is_anonymous,
            'is_individual'     => $is_individual,
            'is_company'        => $is_company,
        ]);

        $user_data = User::find($user->id);
        // Sending email with variables $id and $code to the blade template
        Mail::send('web.pages.code', ['id' => $user_data->id , 'code' => $user_data->verification_code], function ($m) use ($data) {
            $m->to($data['email'])
                ->from('noreply@ftrack.biz')
                ->subject('Account verification for SPHF');
        });

        return $user;
    }
}

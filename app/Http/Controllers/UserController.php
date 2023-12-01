<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function paymentUser()
    {
        return view('web.user.payment_update');
    }

    function updateuser(Request $request)
    {
        $userData = $request->validate([
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'nationality_no'    => ['required', 'string', 'max:255'],
            'nationality'       => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'post_code'         => ['required', 'string', 'max:255'],
            'organiation'       => ['required', 'string', 'max:255'],
            'job_title'         => ['required', 'string', 'max:255'],
            'phone'             => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ]);
        Auth::user()->update($userData);
        return redirect(Route('web.SubmitPaymentDetail'))->with("message", "User updated suceesfully");
    }
}

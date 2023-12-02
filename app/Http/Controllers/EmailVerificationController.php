<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify($id, $code)
    {
        $user = User::findOrFail($id);
        if (!$user->hasValidCode()) {
            return view('web.pages.invalid');
        }

        if ($user->verification_code == $code) {
            $user->markUserVerified();

            return view('web.pages.thank-you');
        }

        return view('web.pages.thank-you');
    }

}

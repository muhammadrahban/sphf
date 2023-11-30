<?php

namespace App\Http\Controllers;

use App\Models\GeneralDonation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralDonationController extends Controller
{
    public function donation(Request $request) {
        $params = $request->all();
        $regist = $request->all();
        unset($regist['amount']);
        unset($regist['charges']);
        unset($regist['total_amount']);
        unset($regist['charged_amount']);
        
        $regist['is_anonymous']     = $request->has('is_anonymous') ? true : false;
        $regist['is_individual']    = $request->has('is_individual') ? true : false;
        $regist['is_company']       = $request->has('is_company') ? true : false;
        
        $user = User::create($regist);
        Auth::login($user);
        
        $amount = intval(str_replace(',', '', $params['amount']));
        $params['amount']           = intval(str_replace(',', '', $params['amount']));
        $params['charges']          = intval(str_replace(',', '', $params['charges']));
        $params['total_amount']     = intval(str_replace(',', '', $params['total_amount']));
        $params['charged_amount']   = intval(str_replace(',', '', $params['charged_amount']));
        $params['is_anonymous']     = $request->has('is_anonymous') ? true : false;
        $params['is_individual']    = $request->has('is_individual') ? true : false;
        $params['is_company']       = $request->has('is_company') ? true : false;
        $params['payment_status']   = 'pending';
        $general = GeneralDonation::create($params);
        return redirect(route('web.home'));
    }
}

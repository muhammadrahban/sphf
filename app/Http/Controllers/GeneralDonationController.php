<?php

namespace App\Http\Controllers;

use App\Models\GeneralDonation;
use Illuminate\Http\Request;

class GeneralDonationController extends Controller
{
    public function donation(Request $request) {
        $params = $request->all();
        $amount = intval(str_replace(',', '', $params['amount']));
        $params['amount'] = $amount;
        $params['charges'] = $amount;
        $params['total_amount'] = $amount;
        $params['charged_amount'] = $amount;
        $params['is_anonymous'] = $request->has('is_anonymous') ? true : false;
        $params['is_individual'] = $request->has('is_individual') ? true : false;
        $params['is_company']   = $request->has('is_company') ? true : false;
        $params['payment_status']   = 'pending';
        $general = GeneralDonation::create($params);
        return redirect(route('web.home'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function submitPaymentDetail(Request $request)
    {
        return view('web.payment.PaymentDetailView');
    }
}

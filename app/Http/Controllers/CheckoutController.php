<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    function checkOutList()
    {
        return view('web.checkout.CheckoutView');
    }
    function proceedCheckoutview()
    {
        return view('web.checkout.ProceedCheckoutView');
    }
}

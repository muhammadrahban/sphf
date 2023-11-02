<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    function filterView(Request $request)
    {

        return view('web.filter.view');
    }
}

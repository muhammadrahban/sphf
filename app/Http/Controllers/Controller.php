<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public static function media($request, $folder = "")
    {
        $extension = $request->file('image')->getClientOriginalExtension();
        return $request->file('image')->storeAs(
            $folder,
            Str::random(20) . '.' . $extension,
            env('DISK')
        );
    }
    public static function currency($amount, $curr_symbol, $symbol)
{
    $Currency   = Currency::where(['base' => $curr_symbol, 'type' => $symbol])->first();
    if($Currency){
        $new_amount = $Currency->amount * $amount;
    }else{
        $new_amount = $amount;
    }
    return $new_amount;
}
}

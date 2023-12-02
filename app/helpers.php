<?php

use App\Models\Currency;

function currency($amount, $curr_symbol, $symbol)
{
    $Currency   = Currency::where(['base' => $curr_symbol, 'type' => $symbol])->first();
    if ($Currency) {
        $new_amount = $Currency->amount * $amount;
    } else {
        $new_amount = $amount;
    }
    return $new_amount;
}

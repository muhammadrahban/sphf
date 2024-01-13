<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralDonation extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'charges',
        'total_amount',
        'charged_amount',
        'transaction_type',
        'check_no',
        'card',
        'cvv',
        'cardholder_first_name',
        'cardholder_last_name',
        'bank',
        'iban',
        'account_title',
        'bank_routing_number',
        'payment_status',
        'user_id',
    ];
}

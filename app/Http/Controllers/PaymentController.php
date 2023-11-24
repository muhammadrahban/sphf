<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    function submitPaymentDetail(Request $request)
    {
        return view('web.payment.PaymentDetailView');
    }

    public function submitPaymentDonation(Request $request) {
        $data = $request->validate([
            // 'amount'                => ['string', 'max:255'],
            // 'charges'               => ['string', 'max:255'],
            // 'total_amount'          => ['string', 'max:255'],
            // 'charged_amount'        => ['string', 'max:255'],
            'transaction_type'      => ['required', 'string', 'in:dod,card,obt'],
            // 'check_no'              => ['string', 'max:255'],
            // 'card'                  => ['string', 'max:255'],
            // 'expire'                => ['string', 'max:255'],
            // 'cvv'                   => ['string', 'max:255'],
            // 'cardholder_first_name' => ['string', 'max:255'],
            // 'cardholder_last_name'  => ['string', 'max:255'],
            // 'bank'                  => ['string', 'max:255'],
            // 'iban'                  => ['string', 'max:255'],
            // 'account_title'         => ['string', 'max:255'],
            // 'bank_routing_number'   => ['string', 'max:255'],
        ]);

        $cartItems  = session()->get('cart', []);
        $amount     = (count($cartItems) * 300000);
        foreach ($cartItems as $key => $value) {
            $donation = Donation::create([
                'user_id'               => Auth::user()->id,
                'victim_id'             => $key,
                'construction_status'   => 'phase_one'
            ]);
            $data['donation_id']    = $donation->id;
            $data['user_id']        = Auth::user()->id;
            $data['victim_id']      = $key;
            $data['amount']         = $amount;
            $data['charges']        = $amount;
            $data['total_amount']   = $amount;
            $data['charged_amount'] = $amount;
            $data['payment_status'] = 'completed';
            DonationInvoice::create($data);
        }
        session()->forget('cart');
        return redirect(Route('web.home'))->with("message", "Donation transfer suceesfully");
    }
}

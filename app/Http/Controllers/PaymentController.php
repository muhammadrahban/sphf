<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\DonationInvoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class PaymentController extends Controller
{
    function submitPaymentDetail(Request $request)
    {
        return view('web.payment.PaymentDetailView');
    }

    public function submitPaymentDonation(Request $request)
    {
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

        $cartItems      = session()->get('cart', []);
        // Currency Code
        // $initial_amount = 300000;
        // $currency       = session()->get('currency');
        // if($currency != 'PKR'){
        //     $amount = currency($initial_amount, 'PKR', $currency);
        // }else{
        //     $amount = $initial_amount;
        // }

        $amount         = (count($cartItems) * $amount);
        $two_per        = ($amount * 2) / 100;
        $thirteen_per   = ($amount * 13) / 100;
        $charges        = $two_per + $two_per + $thirteen_per;
        $tok = $this->authToken($charges + $amount);
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
            $data['charges']        = $charges;
            $data['total_amount']   = $charges + $amount;
            $data['charged_amount'] = $charges + $amount;
            $data['payment_status'] = 'pending';
            $data['order_id'] = $tok['id'];
            DonationInvoice::create($data);
        }

        if($request->transaction_type == "dod")
        {
            session()->forget('cart');
            return redirect(Route('web.home'))->with("message", "Donation transfer suceesfully");
        }
        /* ==============SSO CALL ================*/

        // you need Auth Token & Amount Here before Hashing
        $Key1 = "JX8Unwz2fS8e37ar";
        $Key2 = "5869656954870442";
        $HS_ChannelId = "1001";
        $HS_MerchantId = "24821";
        $HS_StoreId = "033844";
        $HS_IsRedirectionRequest  = 0;
        $HS_ReturnURL = "https://ftrack.biz/sphf/public/home";
        $HS_MerchantHash = "AGRvQQKxriw=";
        $HS_MerchantUsername = "apybej";
        $HS_MerchantPassword = "mGZK278HzVJvFzk4yqF7CA==";
        $transactionTypeId = "3";
        $TransactionAmount = $charges + $amount;
        $bankorderId   = $tok['id'];

        $cipher = "aes-128-cbc";
        $HS_TransactionReferenceNumber = $bankorderId;

        $RequestHash1 = NULL;
        $Currency = "PKR";
        $IsBIN = 0;
        $AuthToken = $tok['auth'];

        $mapStringSSo =
            "AuthToken=$AuthToken"
            . "&RequestHash=$RequestHash1"
            . "&ChannelId=$HS_ChannelId"
            . "&Currency=$Currency"
            . "&IsBIN=$IsBIN"
            . "&ReturnURL=$HS_ReturnURL"
            . "&MerchantId=$HS_MerchantId"
            . "&StoreId=$HS_StoreId"
            . "&MerchantHash=$HS_MerchantHash"
            . "&MerchantUsername=$HS_MerchantUsername"
            . "&MerchantPassword=$HS_MerchantPassword"
            . "&TransactionTypeId=$transactionTypeId"
            . "&TransactionReferenceNumber=$HS_TransactionReferenceNumber"
            . "&TransactionAmount=$TransactionAmount";

        $cipher_text = openssl_encrypt($mapStringSSo, $cipher, $Key1,   OPENSSL_RAW_DATA, $Key2);
        $hashRequest1 = base64_encode($cipher_text);

        echo '<form id="redirectForm" action="https://sandbox.bankalfalah.com/SSO/SSO/SSO" method="post">';
        echo '<input type="hidden" name="AuthToken" value="' . $AuthToken . '">';
        echo '<input type="hidden" name="RequestHash" value="' . $hashRequest1 . '">';
        echo '<input type="hidden" name="ChannelId" value="' . $HS_ChannelId . '">';
        echo '<input type="hidden" name="Currency" value="PKR">';
        echo '<input type="hidden" name="IsBIN" value="0">';
        echo '<input type="hidden" name="ReturnURL" value="' . $HS_ReturnURL . '">';
        echo '<input type="hidden" name="MerchantId" value="' . $HS_MerchantId . '">';
        echo '<input type="hidden" name="StoreId" value="' . $HS_StoreId . '">';
        echo '<input type="hidden" name="MerchantHash" value="' . $HS_MerchantHash . '">';
        echo '<input type="hidden" name="MerchantUsername" value="' . $HS_MerchantUsername . '">';
        echo '<input type="hidden" name="MerchantPassword" value="' . $HS_MerchantPassword . '">';
        echo '<input type="hidden" name="TransactionTypeId" value="3">';
        echo '<input type="hidden" name="TransactionReferenceNumber" value="' . $HS_TransactionReferenceNumber . '">';
        echo '<input type="hidden" name="TransactionAmount" value="' . $TransactionAmount . '">';
        echo '</form>';

        // JavaScript to submit the form automatically
        echo '<script type="text/javascript">';
        echo 'document.getElementById("redirectForm").submit();';
        echo '</script>';
    }

    public function authToken($amount)
    {
        $url = "https://sandbox.bankalfalah.com/HS/HS/HS";

        //$url = "https://payments.bankalfalah.com/HS/HS/HS";


        // $bankorderId   = $this->session->userdata('bankorderId');
        $bankorderId   = auth()->user()->id . rand(0, 1786612);


        $Key1 = "JX8Unwz2fS8e37ar";
        $Key2 = "5869656954870442";
        $HS_ChannelId = "1001";
        $HS_MerchantId = "24821";
        $HS_StoreId = "033844";
        $HS_IsRedirectionRequest  = 0;
        $HS_ReturnURL = "https://ftrack.biz/sphf/public/home";
        $HS_MerchantHash = "AGRvQQKxriw=";
        $HS_MerchantUsername = "apybej";
        $HS_MerchantPassword = "mGZK278HzVJvFzk4yqF7CA==";
        $HS_TransactionReferenceNumber = $bankorderId;
        $transactionTypeId = "3";
        $TransactionAmount = $amount;

        $cipher = "aes-128-cbc";


        $mapString =
            "HS_ChannelId=$HS_ChannelId"
            . "&HS_IsRedirectionRequest=$HS_IsRedirectionRequest"
            . "&HS_MerchantId=$HS_MerchantId"
            . "&HS_StoreId=$HS_StoreId"
            . "&HS_ReturnURL=$HS_ReturnURL"
            . "&HS_MerchantHash=$HS_MerchantHash"
            . "&HS_MerchantUsername=$HS_MerchantUsername"
            . "&HS_MerchantPassword=$HS_MerchantPassword"
            . "&HS_TransactionReferenceNumber=$HS_TransactionReferenceNumber";


        $cipher_text = openssl_encrypt($mapString, $cipher, $Key1,   OPENSSL_RAW_DATA, $Key2);
        $hashRequest = base64_encode($cipher_text);



        //The data you want to send via POST
        $fields = [
            "HS_ChannelId" => $HS_ChannelId,
            "HS_IsRedirectionRequest" => $HS_IsRedirectionRequest,
            "HS_MerchantId" => $HS_MerchantId,
            "HS_StoreId" => $HS_StoreId,
            "HS_ReturnURL" => $HS_ReturnURL,
            "HS_MerchantHash" => $HS_MerchantHash,
            "HS_MerchantUsername" => $HS_MerchantUsername,
            "HS_MerchantPassword" => $HS_MerchantPassword,
            "HS_TransactionReferenceNumber" => $HS_TransactionReferenceNumber,
            "HS_RequestHash" => $hashRequest
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //execute post
        $result = curl_exec($ch);

        $handshake =  json_decode($result);

        $AuthToken = $handshake->AuthToken;


        //echo $result . "<br>";
        //echo $AuthToken . "<br>";

        return ["auth" => $AuthToken, "id" => $bankorderId];
    }
}

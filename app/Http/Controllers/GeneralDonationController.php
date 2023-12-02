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

        // Currency Code
        $initial_amount = $params['amount'];
        $currency       = session()->get('currency');
        if($currency != 'PKR' && $params['symbol'] != 'PKR'){
            $amount     = $this->currency($initial_amount, $params['symbol'], $currency);
        }else{
            $amount     = $initial_amount;
        }

        // this $amount varable is $params['amount'] / $regist['amount'];
        // you can please add there 2% or 13% calculation.

        // it's incomplete

        $regist = $params;
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
        $tok = $this->authToken($params['total_amount']);
        $params['transaction_reference']   = $tok['id'];
        $general = GeneralDonation::create($params);


        if($request->transaction_type == "dod")
        {
            return redirect(route('web.home'));
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
        $TransactionAmount = $params['total_amount'];
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

<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Donation;
use App\Models\DonationInvoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Dompdf\Dompdf;
use Dompdf\Options;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;



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
        $initial_amount = 300000;
        $currency       = session()->get('currency');
        if ($currency != 'PKR') {
            $amount = $this->currency($initial_amount, 'PKR', $currency);
            $currency_db = Currency::where(['type' => 'PKR', 'base' => $currency])->first();
            $amount = $amount * $currency_db->amount;
        } else {
            $amount = $initial_amount;
        }

        $amount         = (count($cartItems) * $amount);
        $two_per        = ($amount * 2) / 100;
        $thirteen_per   = ($amount * 13) / 100;
        $charges        = $two_per + $two_per + $thirteen_per;
        $amount = $amount;
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

        if ($request->transaction_type == "dod") {
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
        $HS_ReturnURL = "https://ftrack.biz/sphf/public/callback";
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
        $HS_ReturnURL = "https://ftrack.biz/sphf/public/callback";
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

    public function handleCallback(Request $request)
    {
        // Get individual query parameters
        $RC = $request->query('RC'); // Get RC parameter value
        $RD = $request->query('RD'); // Get RD parameter value
        $TS = $request->query('TS'); // Get TS parameter value
        $O = $request->query('O');   // Get O parameter value

        // Use the parameters as needed
        // For example, you can return them as a JSON response


        // return response()->json([
        //     'RC' => $RC,
        //     'RD' => $RD,
        //     'TS' => $TS,
        //     'O' => $O
        // ]);
$client = new Client([
    'verify' => false,
]);

        // Replace this URL with your actual endpoint
        $url = 'https://sandbox.bankalfalah.com/HS/api/IPN/OrderStatus/24821/033844/' . $O;

        try {
            $response = $client->request('GET', $url);

            // Get the response body as a string
            $data = $response->getBody()->getContents();

            $decodedData = json_decode($data, true);
            $decodedData = json_decode($decodedData, true);
            $donation = DonationInvoice::where('order_id', $O)->first();



        $headers1 = [
            'x-csrf-token' => 'fetch',
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic VE1DVEVDSDE6QXNhbmkxMjM0NQ==',
            'Cookie' => 'JSESSIONID=SiVTtp97GeSTDCzWPv55ImXyLVXcjQGOmxcA_SAPRjW0iskfe3ix9xvkuQQ0gtng; JSESSIONMARKID=hnph6QXrwHeD_oXiDT9on9TBSO2FhB8K6Lyo6bFwA; MYSAPSSO2=AjExMDAgAA1wb3J0YWw6c2FsbWFuiAAHZGVmYXVsdAEABlNBTE1BTgIAAzAwMAMAA1BPRAQADDIwMjQwMjI0MTgxNgUABAAAAAgKAAZTQUxNQU7%2FAQQwggEABgkqhkiG9w0BBwKggfIwge8CAQExCzAJBgUrDgMCGgUAMAsGCSqGSIb3DQEHATGBzzCBzAIBATAiMB0xDDAKBgNVBAMTA1BPRDENMAsGA1UECxMESjJFRQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjQwMjI0MTgxNjI2WjAjBgkqhkiG9w0BCQQxFgQUjdvcnFtM37DvnWSSOeLlJJn%2FJrQwCQYHKoZIzjgEAwQuMCwCFGNjGD3MKAJA75bDkgUinAyoJxhfAhR0kRU6IXrohDw4zAjehUHfYyJtrg%3D%3D; saplb_*=(J2EE1547120)1547150'
        ];
        $body1 = ''; // Your request body if needed

        $request = new Psr7Request('GET', 'https://103.111.160.108:50001/igwj/odata/sap/ZSPHF_INV_POST_SRV/ZINV_ETSet', $headers1, $body1);
        $request = $client->send($request);

        // Send the request and get the response

        // Extract CSRF token from response headers
        $sToken = $request->getHeader('x-csrf-token')[0];
        //dd($sToken);
        $headers2 = [
            'x-csrf-token' => $sToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic VE1DVEVDSDE6QXNhbmkxMjM0NQ==',
            'Cookie' => 'JSESSIONID=SiVTtp97GeSTDCzWPv55ImXyLVXcjQGOmxcA_SAPRjW0iskfe3ix9xvkuQQ0gtng; JSESSIONMARKID=hnph6QXrwHeD_oXiDT9on9TBSO2FhB8K6Lyo6bFwA; MYSAPSSO2=AjExMDAgAA1wb3J0YWw6c2FsbWFuiAAHZGVmYXVsdAEABlNBTE1BTgIAAzAwMAMAA1BPRAQADDIwMjQwMjI0MTgxNgUABAAAAAgKAAZTQUxNQU7%2FAQQwggEABgkqhkiG9w0BBwKggfIwge8CAQExCzAJBgUrDgMCGgUAMAsGCSqGSIb3DQEHATGBzzCBzAIBATAiMB0xDDAKBgNVBAMTA1BPRDENMAsGA1UECxMESjJFRQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjQwMjI0MTgxNjI2WjAjBgkqhkiG9w0BCQQxFgQUjdvcnFtM37DvnWSSOeLlJJn%2FJrQwCQYHKoZIzjgEAwQuMCwCFGNjGD3MKAJA75bDkgUinAyoJxhfAhR0kRU6IXrohDw4zAjehUHfYyJtrg%3D%3D; saplb_*=(J2EE1547120)1547150'
        ];
        $todayDate = Carbon::now()->format('Ymd');
        //dd($todayDate);



 $body2 = '{
          "BUDAT": "'.$todayDate.'",
          "BPCNIC": "'.$donation->victim->da_cnic.'",
          "DDET": "'.$donation->id.'",
          "WRBTR": "'.$donation->amount.'"
        }';

        $response2 = new Psr7Request('POST', 'https://103.111.160.108:50001/igwj/odata/sap/ZSPHF_INV_POST_SRV/ZINV_ETSet',$headers2, $body2);
                $response2 = $client->send($response2);

        dd($response2);

            // Render the Blade view to a variable
            $view = view('web.invoice-pdf', compact('decodedData'))->render();

            // Create an instance of Dompdf
            $dompdf = new Dompdf();

            // Load HTML content into Dompdf
            $dompdf->loadHtml($view);

            // (Optional) Set paper size and orientation
            $dompdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $dompdf->render();

            // Generate a file name for the invoice (e.g., invoice.pdf)

            // Stream the generated PDF for download
            // Generate a unique file name for the PDF
            $fileName = 'invoice_' . time() . '.pdf';

            // Path to the directory where you want to save the PDF
            $pdfFilePath = public_path('invoices/' . $fileName); // Save in public/invoices directory

            // Save the generated PDF to the server
            file_put_contents($pdfFilePath, $dompdf->output());
            if ($donation) {
                $donation->transaction_status = $decodedData['TransactionStatus'];
                $donation->transaction_reference = $decodedData['TransactionReferenceNumber'];
                $donation->invoice = 'invoices/' . $fileName;
                $donation->save();
            }
            session()->forget('cart');
            return view('web.invoice', ['decodedData' => $decodedData, 'file' => 'https://ftrack.biz/sphf/public/' . 'invoices/' . $fileName]);
        
            
        } catch (\Exception $e) {
            // Handle any exceptions or errors here
            Log::info($e);
            //return response()->json(['error' => $e->getMessage()], 500);
        }
         session()->forget('cart');
            return view('web.invoice', ['decodedData' => $decodedData, 'file' => 'https://ftrack.biz/sphf/public/' . 'invoices/' . $fileName]);
        
    }

    // public function downloadInvoice()
    // {
    //     // Use the decodedData to generate the invoice content
    //     $invoiceContent = "
    //     <h1>Invoice</h1>
    //     <p><strong>Transaction ID:</strong> " . $decodedData['TransactionId'] . "</p>
    //     <p><strong>Transaction Amount:</strong> " . $decodedData['TransactionAmount'] . "</p>
    //     <p><strong>Transaction Status:</strong> " . $decodedData['TransactionStatus'] . "</p>
    //     <p><strong>Order Date & Time:</strong> " . $decodedData['OrderDateTime'] . "</p>
    //     <p><strong>Transaction Date & Time:</strong> " . $decodedData['TransactionDateTime'] . "</p>
    //     <p><strong>Merchant ID:</strong> " . $decodedData['MerchantId'] . "</p>
    //     <p><strong>Merchant Name:</strong> " . $decodedData['MerchantName'] . "</p>
    //     <p><strong>Store ID:</strong> " . $decodedData['StoreId'] . "</p>
    //     <p><strong>Store Name:</strong> " . $decodedData['StoreName'] . "</p>
    //     <p><strong>Transaction Type ID:</strong> " . $decodedData['TransactionTypeId'] . "</p>
    //     <p><strong>Transaction Reference Number:</strong> " . $decodedData['TransactionReferenceNumber'] . "</p>
    //     <p><strong>Mobile Number:</strong> " . $decodedData['MobileNumber'] . "</p>
    //     <p><strong>Description:</strong> " . $decodedData['Description'] . "</p>
    //     <p><strong>Response Code:</strong> " . $decodedData['ResponseCode'] . "</p>";

    //     // Create an instance of Dompdf
    //     $dompdf = new Dompdf();

    //     // Set options for PDF generation
    //     $options = new Options();
    //     $options->set('isHtml5ParserEnabled', true);
    //     $dompdf->setOptions($options);

    //     // Load HTML content into Dompdf
    //     $dompdf->loadHtml($invoiceContent);

    //     // (Optional) Set paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Generate a file name for the invoice (e.g., invoice.pdf)
    //     $fileName = 'invoice.pdf';

    //     // Stream the generated PDF for download
    //     $dompdf->stream($fileName);
    // }

    // public function downloadInvoice()
    // {
    //     // Use $decodedData from your Blade view
    //     $decodedData = [
    //         // ... your data
    //     ];

    //     // Render the Blade view to a variable
    //     $view = view('your.blade.view', compact('decodedData'))->render();

    //     // Create an instance of Dompdf
    //     $dompdf = new Dompdf();

    //     // Load HTML content into Dompdf
    //     $dompdf->loadHtml($view);

    //     // (Optional) Set paper size and orientation
    //     $dompdf->setPaper('A4', 'portrait');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Generate a file name for the invoice (e.g., invoice.pdf)
    //     $fileName = 'invoice.pdf';

    //     // Stream the generated PDF for download
    //     return $dompdf->stream($fileName);
    // }

}

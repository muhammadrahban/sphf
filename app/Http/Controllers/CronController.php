<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CronController extends Controller
{
    public function getCurreny()
    {
        $currencies = [
            'PKR_TO_USD' => ['PKR', 'USD'],
            'USD_TO_PKR' => ['USD', 'PKR'],
            'PKR_TO_EUR' => ['PKR', 'EUR'],
            'EUR_TO_PKR' => ['EUR', 'PKR'],
            'PKR_TO_GBP' => ['PKR', 'GBP'],
            'GBP_TO_PKR' => ['GBP', 'PKR'],
        ];
        foreach ($currencies as $value) {
            $this->updateCurrency($value[0], $value[1]);
            // echo $value[0] .' --- '. $value[1] .' \\n ';
        }
        echo "Save Data Successfully";
    }

    public function updateCurrency($from, $to)
    {
        $client = new Client();
        $res = $client->get('https://api.getgeoapi.com/v2/currency/convert?api_key=13e5e81afa3a08e925b40b94ae4c7f1fe4907f65&from='.$from.'&to='.$to.'&amount=1&format=json');

        if ($res->getStatusCode() == 200) {
            $result = json_decode($res->getBody()->getContents(), true);

            if ($result['status'] == 'success') {
                $baseCurrency = $result['base_currency_code'];
                $amount = $result['amount'];

                foreach ($result['rates'] as $currencyCode => $rateInfo) {
                    $rate = $rateInfo['rate'];
                    echo "Base Currency: $baseCurrency\n";
                    echo "Amount: $amount\n";
                    echo "Currency Code: $currencyCode\n";
                    echo "Rate: $rate\n";

                    Currency::updateOrCreate([
                        'base'  => $baseCurrency,
                        'type'  => $currencyCode,
                    ],
                    [
                        'base_amount' => $amount,
                        'amount' => $rate
                    ]);
                }
                echo "Save Data Successfully";
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\victim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CartController extends Controller
{
        private $apiUrl = 'https://103.111.160.108:50001/igwj/odata/sap/ZSPHF_GET_BENF_DATA_SRV/ZES_BENF';

   public function index()
{
    $cartItems = session()->get('cart', []);
    $currency = session()->get('currency');
    $ids = array_keys($cartItems);
    $foundItems = [];

    foreach ($ids as $id) {
        $id = (string) $id;
        $response = Http::withOptions([
            'verify' => false, // Disable SSL certificate verification
        ])->withHeaders([
            'x-csrf-token' => 'fetch',
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode('TMCTECH1:SPHF@123'),
            'Cookie' => 'JSESSIONID=mMmRMHkTOk0TtKTcbDBkTwAvsSCnkAGOmxcA_SAPiR7fJrvaslRX3G43KenhfLbh; JSESSIONMARKID=vPQOvgmrPzQKwo4pzkKfg5OWg_82xwX5NsmY6bFwA; MYSAPSSO2=AjExMDAgAA9wb3J0YWw6dG1jdGVjaDGIAAdkZWZhdWx0AQAIVE1DVEVDSDECAAMwMDADAANQT0QEAAwyMDI0MDcxNTA5MzkFAAQAAAAICgAIVE1DVEVDSDH%2FAQQwggEABgkqhkiG9w0BBwKggfIwge8CAQExCzAJBgUrDgMCGgUAMAsGCSqGSIb3DQEHATGBzzCBzAIBATAiMB0xDDAKBgNVBAMTA1BPRDENMAsGA1UECxMESjJFRQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjQwNzE1MDkzOTMyWjAjBgkqhkiG9w0BCQQxFgQUVgI85tgOBY0ibnRV34QLGldzM58wCQYHKoZIzjgEAwQuMCwCFAPbR3c2x8s5iP6DZisN5hVjz2rXAhQ7i1ctiixbDlBzHd0RKza%2FkmqiNQ%3D%3D; saplb_*=(J2EE1547120)1547150'
        ])->get($this->apiUrl . "('{$id}')");

        $apiData = $response->json();

        // Check if the response contains results
        if (isset($apiData['d']) && !empty($apiData['d'])) {
            $foundItems[] = [
                'id' => $apiData['d']['BenfId'] ?? null, // Use null coalescing to avoid undefined index
                'uuid' => $apiData['d']['UuId'] ?? null,
                'filled_da_form_id' => $apiData['d']['FormId'] ?? null,
                'da_cnic' => $apiData['d']['Cnic'] ?? null,
                'da_occupant_name' => $apiData['d']['BenfName'] ?? null,
                'gender' => $apiData['d']['Gender'] ?? null,
                'district' => $apiData['d']['District'] ?? null,
                'tehsil' => $apiData['d']['Tehsil'] ?? null,
                'union_council' => $apiData['d']['Uc'] ?? null,
                'deh' => $apiData['d']['Dehat'] ?? null,
                'widows' => $apiData['d']['Vul01'] ?? null,
                'women_with_disable_husband' => $apiData['d']['Vul02'] ?? null,
                'divorced_abandoned_unmarried_older_dependent_on_others' => $apiData['d']['Vul03'] ?? null,
                'people_with_disability_physically_or_mentally' => $apiData['d']['Vul04'] ?? null,
                'unaccompained_minors_i_e_orphans' => $apiData['d']['Vul05'] ?? null,
                'unaccompained_elders_over_the_age_of_60' => $apiData['d']['Vul06'] ?? null,
            ];
        }
    }

    $count = count($foundItems);
    $initial_amount = 300000;

    foreach ($foundItems as &$value) {
        if ($currency != 'PKR') {
            $amount = $this->currency($initial_amount, 'PKR', $currency);
        } else {
            $amount = $initial_amount;
        }
        $value['price'] = $amount;
    }

    return view('web.cart.cart', compact('foundItems', 'count'));
}

    public function store(Request $request)
    {
        $itemIds = $request->input('item_ids');
        if($itemIds != null){
            foreach ($itemIds as $itemId) {
                $cart = session()->get('cart', []);
                if (!array_key_exists($itemId, $cart)) {
                    $cart[$itemId] = [
                        'quantity' => 1
                    ];
                }
                session()->put('cart', $cart);
            }
        }
        if($request->action == 'button'){
            return redirect(route('cart.index'))->with('success', 'Items added to cart');
        }
        return redirect(route('user.paymentuser'))->with('success', 'Items added to cart');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect(route('cart.index'))->with('success', 'Items removed from cart');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect('/cart')->with('success', 'Cart cleared');
    }
}

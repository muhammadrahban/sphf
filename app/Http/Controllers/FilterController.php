<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\victim;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Cache;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class FilterController extends Controller
{
    // private $apiUrl = 'https://103.111.160.108:50001/igwj/odata/sap/ZSPHF_GET_BENF_DATA_SRV/ZES_BENF';

    // public function filterView(Request $request)
    // {
    //     if (auth()->user()->email_verified_at == null) {
    //         $data['message'] = "Please Verify Your Email To Adopt beneficiary.";
    //         return view('web.verify-message', compact('data'));
    //     }
    //     $filtersApplied = false;


    //     $limit = 10;
    //     $offset = $request->has('page') ? $request->page : 0;
    //     $data['page'] = $offset;

    //     $filters = $this->buildFilters($request);


    //     $response = Http::withOptions([
    //         'verify' => false, // Disable SSL certificate verification
    //     ])->withHeaders([
    //         'x-csrf-token' => 'fetch',
    //         'Accept' => 'application/json',
    //         'Authorization' => 'Basic ' . base64_encode('TMCTECH1:SPHF@123'),
    //         'Cookie' => 'JSESSIONID=mMmRMHkTOk0TtKTcbDBkTwAvsSCnkAGOmxcA_SAPiR7fJrvaslRX3G43KenhfLbh; JSESSIONMARKID=vPQOvgmrPzQKwo4pzkKfg5OWg_82xwX5NsmY6bFwA; MYSAPSSO2=AjExMDAgAA9wb3J0YWw6dG1jdGVjaDGIAAdkZWZhdWx0AQAIVE1DVEVDSDECAAMwMDADAANQT0QEAAwyMDI0MDcxNTA5MzkFAAQAAAAICgAIVE1DVEVDSDH%2FAQQwggEABgkqhkiG9w0BBwKggfIwge8CAQExCzAJBgUrDgMCGgUAMAsGCSqGSIb3DQEHATGBzzCBzAIBATAiMB0xDDAKBgNVBAMTA1BPRDENMAsGA1UECxMESjJFRQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjQwNzE1MDkzOTMyWjAjBgkqhkiG9w0BCQQxFgQUVgI85tgOBY0ibnRV34QLGldzM58wCQYHKoZIzjgEAwQuMCwCFAPbR3c2x8s5iP6DZisN5hVjz2rXAhQ7i1ctiixbDlBzHd0RKza%2FkmqiNQ%3D%3D; saplb_*=(J2EE1547120)1547150'
    //     ])->get($this->apiUrl, [
    //         '$filter' => $filters,
    //         '$top' => $limit,
    //         '$skip' => $offset * $limit,
    //     ]);

    //     $apiData = $response->json();

    //     // Check if the response contains results
    //     if (isset($apiData['d']['results']) && !empty($apiData['d']['results'])) {
    //         $foundItems = array_map(function ($item) {
    //             return [
    //                 'id' => $item['BenfId'],
    //                 'uuid' => $item['UuId'],
    //                 'filled_da_form_id' => $item['FormId'],
    //                 'da_cnic' => $item['Cnic'],
    //                 'da_occupant_name' => $item['BenfName'],
    //                 'gender' => $item['Gender'],
    //                 'district' => $item['District'],
    //                 'tehsil' => $item['Tehsil'],
    //                 'union_council' => $item['Uc'],
    //                 'deh' => $item['Dehat'],
    //                 'widows' => $item['Vul01'],
    //                 'women_with_disable_husband' => $item['Vul02'],
    //                 'divorced_abandoned_unmarried_older_dependent_on_others' => $item['Vul03'],
    //                 'people_with_disability_physically_or_mentally' => $item['Vul04'],
    //                 'unaccompained_minors_i_e_orphans' => $item['Vul05'],
    //                 'unaccompained_elders_over_the_age_of_60' => $item['Vul06'],
    //             ];
    //         }, $apiData['d']['results']);
    //     } else {
    //         $foundItems = [];
    //     }

    //     $count = count($foundItems);
    //     $currency = session()->get('currency');
    //     $initial_amount = 300000;

    //     foreach ($foundItems as $key => $value) {
    //         $amount = $currency != 'PKR' ? $this->currency($initial_amount, 'PKR', $currency) : $initial_amount;
    //         $foundItems[$key]['price'] = $amount;
    //     }


    //     // Fetch location lists


    //     // Fetch location lists

    //     $location_list_tehsil = [];
    //     $location_list_union_council = [];
    //     $location_list_deh = [];
    //     $location_list = victim::select('district', DB::raw('count(*) as total'))
    //         ->groupBy('district')
    //         ->get();
    //     if ($request->district  && $request->district != 'Select District' && $request->district != null) {
    //         $district = $request->district;
    //         $data['district'] = $district;
    //         $location_list_tehsil = victim::where('district', $district)->select('tehsil', DB::raw('count(*) as total'))
    //             ->groupBy('tehsil')
    //             ->get();
    //         $filtersApplied = true;
    //     }
    //     if ($request->deh) {
    //         $deh = $request->deh;
    //         $data['deh'] = $deh;
    //         $filtersApplied = true;
    //     }

    //     if ($request->tehsil) {
    //         $tehsil = $request->tehsil;
    //         $data['tehsil'] = $tehsil;
    //         $location_list_union_council = victim::where('tehsil', $tehsil)->select('union_council', DB::raw('count(*) as total'))
    //             ->groupBy('union_council')
    //             ->get();
    //         $filtersApplied = true;
    //     }

    //     if ($request->union_council) {
    //         $union_council = $request->union_council;
    //         $data['union_council'] = $union_council;
    //         $location_list_deh = victim::where('union_council', $union_council)->select('deh', DB::raw('count(*) as total'))
    //             ->groupBy('deh')
    //             ->get();
    //         $filtersApplied = true;
    //     }

    //     $selectedOptions = $this->getSelectedOptions($request);

    //     if ($request->has('currency')) {
    //         $currency = $request->currency;
    //         session()->forget('currency');
    //         session()->get('currency', $currency);
    //         $cart = session()->put('currency', $currency);
    //     }

    //     return view('web.filter.view', compact('foundItems', 'count', 'data', 'location_list', 'location_list_tehsil', 'location_list_union_council', 'location_list_deh', 'selectedOptions'));
    // }

    // private function buildFilters(Request $request)
    // {
    //     $filters = [];

    //     if ($request->has('keywords') && $request->keywords != '') {
    //         $filters[] = "contains(Cnic, '{$request->keywords}')";
    //     }

    //     if ($request->has('district') && $request->district != 'Select District' && $request->district != null) {
    //         $filters[] = "District eq '{$request->district}'";
    //     }

    //     if ($request->has('tehsil') && $request->tehsil != 'Select tehsil' && $request->tehsil != null) {
    //         $filters[] = "Tehsil eq '{$request->tehsil}'";
    //     }

    //     if ($request->has('union_council') && $request->union_council != 'Select union council' && $request->union_council != null) {
    //         $filters[] = "Uc eq '{$request->union_council}'";
    //     }

    //     if ($request->has('deh') && $request->deh != 'Select deh' && $request->deh != null) {
    //         $filters[] = "Dehat eq '{$request->deh}'";
    //     }

    //     if ($request->has('gender') && $request->gender != 'Select Gender') {
    //         $filters[] = "Gender eq '{$request->gender}'";
    //     }

    //     $filters = $this->applyVulnerabilityFilters($request, $filters);
    //     if (count($filters) > 0) {
    //         $filters[] = "IsAdoptable eq 'Y'";
    //     }

    //     return implode(' and ', $filters);
    // }

    // private function applyVulnerabilityFilters(Request $request, $filters)
    // {
    //     if ($request->has('orphan')) {
    //         $filters[] = "Vul05 eq 'Y'";
    //     }

    //     if ($request->has('widow')) {
    //         $filters[] = "Vul01 eq 'Y'";
    //     }

    //     if ($request->has('women')) {
    //         $filters[] = "Vul02 eq 'Y'";
    //     }

    //     if ($request->has('elderly')) {
    //         $filters[] = "Vul06 eq 'Y'";
    //     }

    //     if ($request->has('differently_abled')) {
    //         $filters[] = "Vul04 eq 'Y'";
    //     }

    //     return $filters;
    // }

    private $apiUrl = 'http://103.111.160.107:8183/ZSPHF_GET_BENF_DATA_SRV/ZES_BENF';

    public function filterView(Request $request)
    {
        if (auth()->user()->email_verified_at == null) {
            $data['message'] = "Please Verify Your Email To Adopt beneficiary.";
            return view('web.verify-message', compact('data'));
        }

        $limit = 10;
        $offset = $request->has('page') ? $request->page : 0;
        $data['page'] = $offset;

        $queryParams = $this->buildQueryParameters($request);
        $queryParams['NoOfHits'] = $limit;
        $queryParams['$skip'] = $offset * $limit;

        $response = Http::withOptions([
            'verify' => false, // Disable SSL certificate verification
        ])->withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode('tmc-dev:tmc@56789'),
        ])->get($this->apiUrl, $queryParams);

        $apiData = $response->json();

        // Process API Response
        $foundItems = isset($apiData) && !empty($apiData) ? array_map(function ($item) {
            return [
                'id' => $item['UuId'],
                'uuid' => $item['UuId'],
                'filled_da_form_id' => $item['FormId'],
                'da_cnic' => $item['Cnic'],
                'da_occupant_name' => $item['BenfName'],
                'gender' => $item['Gender'],
                'district' => $item['District'],
                'tehsil' => $item['Tehsil'],
                'union_council' => $item['Uc'],
                'deh' => $item['Dehat'],
                'widows' => $item['Vul01'],
                'women_with_disable_husband' => $item['Vul02'],
                'divorced_abandoned_unmarried_older_dependent_on_others' => $item['Vul03'],
                'people_with_disability_physically_or_mentally' => $item['Vul04'],
                'unaccompained_minors_i_e_orphans' => $item['Vul05'],
                'unaccompained_elders_over_the_age_of_60' => $item['Vul06'],
            ];
        }, $apiData) : [];

        $count = count($foundItems);
        $currency = session()->get('currency');
        $initial_amount = 300000;

        foreach ($foundItems as $key => $value) {
            $amount = $currency != 'PKR' ? $this->currency($initial_amount, 'PKR', $currency) : $initial_amount;
            $foundItems[$key]['price'] = $amount;
        }

        // Fetch location lists (same as your original code)

        return view('web.filter.view', compact('foundItems', 'count', 'data', 'location_list', 'location_list_tehsil', 'location_list_union_council', 'location_list_deh', 'selectedOptions'));
    }

    private function buildQueryParameters(Request $request)
    {
        $queryParams = [];

        if ($request->has('keywords') && $request->keywords != '') {
            $queryParams['Cnic'] = $request->keywords;
        }

        if ($request->has('district') && $request->district != 'Select District' && $request->district != null) {
            $queryParams['District'] = $request->district;
        }

        if ($request->has('tehsil') && $request->tehsil != 'Select tehsil' && $request->tehsil != null) {
            $queryParams['Tehsil'] = $request->tehsil;
        }

        if ($request->has('union_council') && $request->union_council != 'Select union council' && $request->union_council != null) {
            $queryParams['Uc'] = $request->union_council;
        }

        if ($request->has('deh') && $request->deh != 'Select deh' && $request->deh != null) {
            $queryParams['Dehat'] = $request->deh;
        }

        if ($request->has('gender') && $request->gender != 'Select Gender') {
            $queryParams['Gender'] = $request->gender;
        }

        // Vulnerability Filters
        $queryParams = $this->applyVulnerabilityFilters($request, $queryParams);

        $queryParams['IsAdoptable'] = 'Y'; // Always set to 'Y'

        return $queryParams;
    }

    private function applyVulnerabilityFilters(Request $request, $queryParams)
    {
        if ($request->has('orphan')) {
            $queryParams['Vul05'] = 'Y';
        }

        if ($request->has('widow')) {
            $queryParams['Vul01'] = 'Y';
        }

        if ($request->has('women')) {
            $queryParams['Vul02'] = 'Y';
        }

        if ($request->has('elderly')) {
            $queryParams['Vul06'] = 'Y';
        }

        if ($request->has('differently_abled')) {
            $queryParams['Vul04'] = 'Y';
        }

        return $queryParams;
    }


    private function getSelectedOptions(Request $request)
    {
        $selectedOptions = [];

        if ($request->has('orphan')) {
            $selectedOptions[] = 'orphan';
        }

        if ($request->has('widow')) {
            $selectedOptions[] = 'widow';
        }

        if ($request->has('women')) {
            $selectedOptions[] = 'women';
        }

        if ($request->has('elderly')) {
            $selectedOptions[] = 'elderly';
        }

        if ($request->has('differently_abled')) {
            $selectedOptions[] = 'differently_abled';
        }

        return $selectedOptions;
    }

    private function getLocationList($filterValue = null, $filterType = 'district')
    {
        $response = Http::withOptions([
            'verify' => false, // Disable SSL certificate verification
        ])->withHeaders([
            'x-csrf-token' => 'fetch',
            'Accept' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode('TMCTECH1:SPHF@123'),
            'Cookie' => 'JSESSIONID=mMmRMHkTOk0TtKTcbDBkTwAvsSCnkAGOmxcA_SAPiR7fJrvaslRX3G43KenhfLbh; JSESSIONMARKID=vPQOvgmrPzQKwo4pzkKfg5OWg_82xwX5NsmY6bFwA; MYSAPSSO2=AjExMDAgAA9wb3J0YWw6dG1jdGVjaDGIAAdkZWZhdWx0AQAIVE1DVEVDSDECAAMwMDADAANQT0QEAAwyMDI0MDcxNTA5MzkFAAQAAAAICgAIVE1DVEVDSDH%2FAQQwggEABgkqhkiG9w0BBwKggfIwge8CAQExCzAJBgUrDgMCGgUAMAsGCSqGSIb3DQEHATGBzzCBzAIBATAiMB0xDDAKBgNVBAMTA1BPRDENMAsGA1UECxMESjJFRQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMjQwNzE1MDkzOTMyWjAjBgkqhkiG9w0BCQQxFgQUVgI85tgOBY0ibnRV34QLGldzM58wCQYHKoZIzjgEAwQuMCwCFAPbR3c2x8s5iP6DZisN5hVjz2rXAhQ7i1ctiixbDlBzHd0RKza%2FkmqiNQ%3D%3D; saplb_*=(J2EE1547120)1547150'
        ])->get($this->apiUrl, [
            '$filter' => "$filterType eq '$filterValue'",
            '$select' => "$filterType, count($filterType) as total",
            '$groupby' => $filterType,
        ]);

        return $response->json()['d']['results'] ?? [];
    }

    // public function currency($amount, $curr_symbol, $symbol)
    // {
    //     // Implement currency conversion logic here
    //     return $amount; // For now, just returning the same amount
    // }

    public function filterVictim(Request $request)
    {
        if ($request->district) {
            $data = victim::select('tehsil', DB::raw('count(*) as total'))
                ->where('district', $request->district)
                ->groupBy('tehsil')
                ->get();
        }

        if ($request->tehsil) {
            $data = victim::select('union_council', DB::raw('count(*) as total'))
                ->where('tehsil', $request->tehsil)
                ->groupBy('union_council')
                ->get();
        }

        if ($request->union_council) {
            $data = victim::select('deh', DB::raw('count(*) as total'))
                ->where('union_council', $request->union_council)
                ->groupBy('deh')
                ->get();
        }
        return response()->json($data, 200);
    }
}

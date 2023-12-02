<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\victim;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use \Cache;

class FilterController extends Controller
{
    public function filterView(Request $request)
    {
        $limit          = 10;
        $offset         = $request->has('page') ? $request->page : 0;
        $data['page']   = $offset;
        $foundItems = victim::query();

        if ($request->has('keywords') && $request->keywords != '') {
            $keyword = $request->keywords;
            $data['keywords'] = $keyword;
            $foundItems->where('da_occupant_name', 'like', '%' . $keyword . '%');
        }

        if ($request->has('district') && $request->location != 'Select district' && $request->location != null) {
            $district = $request->district;
            $data['district'] = $district;
            $foundItems->where('district', $district);
        }
        if ($request->has('tehsil') && $request->tehsil != 'Select tehsil' && $request->tehsil != null) {
            $tehsil = $request->tehsil;
            $data['tehsil'] = $tehsil;
            $foundItems->where('tehsil', $tehsil);
        }
        if ($request->has('union_council') && $request->union_council != 'Select union council' && $request->union_council != null) {
            $union_council = $request->union_council;
            $data['union_council'] = $union_council;
            $foundItems->where('union_council', $union_council);
        }
        if ($request->has('deh') && $request->location != 'Select deh' && $request->deh != null) {
            $deh = $request->deh;
            $data['deh'] = $deh;
            $foundItems->where('deh', $deh);
        }

        if ($request->has('gender') && $request->gender != 'Select Gender') {
            $gender = $request->gender;
            $data['gender'] = $gender;
            $foundItems->where('gender', $gender);
        }

        if ($request->has('currency')) {
            $currency = $request->currency;
            session()->forget('currency');
            session()->get('currency', $currency);
            $cart = session()->put('currency', $currency);
        }

        $count = $foundItems->count();

        $foundItems     = $foundItems->offset($offset * $limit)->take($limit)->get();

        $currency       = session()->get('currency');
        $initial_amount = 300000;
        foreach ($foundItems as $key => $value) {
            if ($currency != 'PKR') {
                $amount = $this->currency($initial_amount, 'PKR', $currency);
            } else {
                $amount = $initial_amount;
            }
            $foundItems[$key]['price']  = $amount;
            // dd(session()->get('currency'));
        }

        $location_list = victim::select('district', DB::raw('count(*) as total'))
            ->groupBy('district')
            ->get();
        $location_list_tehsil = victim::select('tehsil', DB::raw('count(*) as total'))
            ->groupBy('tehsil')
            ->get();
        $location_list_union_council = victim::select('union_council', DB::raw('count(*) as total'))
            ->groupBy('union_council')
            ->get();
        $location_list_deh = victim::select('deh ', DB::raw('count(*) as total'))
            ->groupBy('deh')
            ->get();

        return view('web.filter.view', compact('foundItems', 'count', 'data', 'location_list', 'location_list_tehsil', 'location_list_union_council', 'location_list_deh'));
    }

    public function currency($amount, $curr_symbol, $symbol)
    {
        $Currency   = Currency::where(['base' => $curr_symbol, 'type' => $symbol])->first();
        if ($Currency) {
            $new_amount = $Currency->amount * $amount;
        } else {
            $new_amount = $amount;
        }
        return $new_amount;
    }
}

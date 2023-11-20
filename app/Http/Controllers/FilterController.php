<?php

namespace App\Http\Controllers;

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

        if ($request->has('location') && $request->location != 'Select Location') {
            $location = $request->location;
            $data['location'] = $location;
            $foundItems->where('tehsil', $location);
        }

        if ($request->has('gender') && $request->gender != 'Select Gender') {
            $gender = $request->gender;
            $data['gender'] = $gender;
            $foundItems->where('gender', $gender);
        }

        $count = $foundItems->count();

        $foundItems = $foundItems->offset($offset * $limit)->take($limit)->get();

        $location_list = Cache::remember('tehsil_list', now()->addHours(24), function () {
            return victim::select('tehsil')->get()->groupBy('tehsil');
        });


        return view('web.filter.view', compact('foundItems', 'count', 'data', 'location_list'));
    }
}

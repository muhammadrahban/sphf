<?php

namespace App\Http\Controllers;

use App\Models\victim;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    function filterView(Request $request)
    {
        $count      = 0;
        $limit      = 10;
        $offset     = 0;
        $data       = [];
        if ($request->has('keywords') && $request->keywords != '') {
            $keyword = $request->keywords;
            $data['keywords'] = $keyword;
        }

        if ($request->has('location') && $request->location != 'Select Location') {
            $location = $request->location;
            $data['location'] = $location;
        }

        if ($request->has('gender') && $request->gender != 'Select Gender') {
            $gender = $request->gender;
            $data['gender'] = $gender;
        }

        if ($request->has('page')) {
            $offset = $request->page;
            $data['page'] = $request->page;
        }

        $location_list  = victim::select('tehsil')->get()->groupBy('tehsil');
        $foundItems = new victim();

        if (isset($keyword)) {
            $foundItems = $foundItems->where('da_occupant_name','like', '%'.$keyword.'%');
        } elseif (isset($location)) {
            $foundItems = $foundItems->where('tehsil', $location);
        } elseif (isset($gender)) {
            $foundItems = $foundItems->where('gender', $gender);
        }
        $count = $foundItems->count();
        $foundItems = $foundItems->offset($offset*$limit)->take($limit)->get();
        return view('web.filter.view', compact('foundItems', 'count', 'data', 'location_list'));
    }
}

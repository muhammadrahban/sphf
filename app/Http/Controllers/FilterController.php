<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilterController extends Controller
{
    function filterView(Request $request)
    {
        $json       = \File::json('simple.json');
        $json       = $json['d']['results'];
        $foundItems = [];
        $count      = 0;
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

        if (isset($keyword) && isset($location) && isset($gender)) {
            foreach ($json as $item) {
                $keywordPattern = "/$keyword/i";
                $locationPattern = "/$location/i";
                if (preg_match($keywordPattern, $item['BenfName'])
                    && preg_match($locationPattern, $item['Tehsil'])
                    && $item['Gender'] == $gender) {
                    $foundItems[] = $item;
                }
            }
        } elseif (isset($keyword)) {
            foreach ($json as $item) {
                $keywordPattern = "/$keyword/i";
                if (preg_match($keywordPattern, $item['BenfName'])) {
                    $foundItems[] = $item;
                }
            }
        } elseif (isset($location)) {
            foreach ($json as $item) {
                $locationPattern = "/$location/i";
                if (preg_match($locationPattern, $item['Tehsil'])) {
                    $foundItems[] = $item;
                }
            }
        } elseif (isset($gender)) {
            foreach ($json as $item) {
                if ($item['Gender'] == $gender) {
                    $foundItems[] = $item;
                }
            }
        } else {
            $foundItems = $json;
        }

        $count = count($foundItems);
        return view('web.filter.view', compact('foundItems', 'count', 'data'));
    }
}

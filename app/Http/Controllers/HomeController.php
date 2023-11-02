<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Reward;
use App\Models\Survey;
use App\Models\User;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countData = [
            "user" => user::where('user_type', 'user')->count(),
            "surveys" => Survey::count(),
            "products" => Product::count(),
            "offers" => Offer::count(),
        ];
        return view('home', compact('countData'));
    }
}

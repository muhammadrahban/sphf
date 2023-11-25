<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index(){
        $count                  = Donation::where('user_id', auth()->user()->id)->count();
        $count_phase_one        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_one')->count();
        $count_phase_two        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_two')->count();
        $count_phase_three      = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_three')->count();
        $count_phase_four       = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_four')->count();
        $count_completed        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'completed')->count();
        return view('web.dashboard.index', compact('count', 'count_phase_one', 'count_phase_two', 'count_phase_three', 'count_phase_four', 'count_completed'));
    }

    public function profile(){
        return view('web.dashboard.profile');
    }

    public function track(){
        $donation               = Donation::where('user_id', auth()->user()->id);
        $count                  = $donation->count();
        $donation               = $donation->with('victim')->get();
        $count_phase_one        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_one')->count();
        $count_phase_two        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_two')->count();
        $count_phase_three      = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_three')->count();
        $count_phase_four       = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'phase_four')->count();
        $count_completed        = Donation::where('user_id', auth()->user()->id)->where('construction_status', 'completed')->count();
        return view('web.dashboard.track', compact('donation', 'count', 'count_phase_one', 'count_phase_two', 'count_phase_three', 'count_phase_four', 'count_completed'));
    }

    public function donation(){
        $donation               = Donation::where('user_id', auth()->user()->id);
        $count                  = $donation->count();
        $donation               = $donation->with('victim', 'DonationInvoice')->get();
        return view('web.dashboard.history', compact('donation', 'count'));
    }

    function updateuser(Request $request)
    {
        $userData = $request->validate([
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'nationality_no'    => ['required', 'string', 'max:255'],
            'nationality'       => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'city'              => ['required', 'string', 'max:255'],
            'country'           => ['required', 'string', 'max:255'],
            'post_code'         => ['required', 'string', 'max:255'],
            'organiation'       => ['required', 'string', 'max:255'],
            'job_title'         => ['required', 'string', 'max:255'],
            'comments'          => ['required', 'string', 'max:255'],
            'phone'             => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore(auth()->id()),
            ],
            'is_anonymously'    => ['accepted'],
            'is_individual'     => ['accepted'],
            'is_company'        => ['accepted'],
        ]);
        $userData['is_anonymously'] = isset($userData['is_anonymously']) ? true : false;
        $userData['is_individual']  = isset($userData['is_individual']) ? true : false;
        $userData['is_company']     = isset($userData['is_company']) ? true : false;
        Auth::user()->update($userData);
        return redirect(Route('web.profile'))->with("message", "User updated suceesfully");
    }
}

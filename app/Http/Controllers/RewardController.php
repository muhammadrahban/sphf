<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    function getRewards()
    {
        $rewards = Reward::orderBy('created_at', 'DESC')->get();
        return view('Reward.RewardList', compact('rewards'));
    }


    function edit(Reward $reward)
    {
        // return implode(',', $reward->values);
        return view('Reward.RewardUpdate', compact('reward'));
    }
    function update(Request $request, Reward $reward)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'subtitle'      => 'required|max:50',
            // 'redirect_url'  => 'required',
            'fdp'           => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media($request, "reward");
        }
        $fdpstring = implode(" ", $request->fdp);
        $fdp_values =  "[" . $fdpstring . "]";
        $validateData['values'] = $fdp_values;
        $reward->update($validateData);

        return redirect(route('reward.list'))->with('message', 'reward updated successfully');
    }
}

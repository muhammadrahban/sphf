<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    function getOffers()
    {
        $offers = Offer::orderBy('created_at', 'DESC')->get();
        return view('Offer.OffersList', compact('offers'));
    }

    function create()
    {
        return view('Offer.OfferUpdateCreate');
    }


    function add(Request $request)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'subtitle'      => 'required|max:50',
            'redirect_url'  => 'required',
            'fdp'           => 'required|integer',
            'image'         => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media(
                $request,
                "offer"
            );
        }
        Offer::create($validateData);
        return redirect(route('offer.list'))->with('message', 'offer created successfully');
    }

    function edit(Offer $offer)
    {
        return view('Offer.OfferUpdateCreate', compact('offer'));
    }

    public function update(Request $request, Offer $offer)
    {
        $validateData = $request->validate([
            'title'         => 'required|max:50',
            'subtitle'      => 'required|max:50',
            'redirect_url'  => 'required',
            'fdp'           => 'required',
        ]);
        if ($request->hasFile("image")) {
            $validateData["image"] = $this->media($request, "offer");
        }
        $offer->update($validateData);
        return redirect(route('offer.list'))->with('message', 'Offer updated successfully');
    }

    function delete(Offer $offer)
    {
        $offer->delete();
        return redirect(route('offer.list'))->with('message', 'offer deleted saccessfully');
    }
}

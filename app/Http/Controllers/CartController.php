<?php

namespace App\Http\Controllers;

use App\Models\victim;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session()->get('cart', []);
        $ids = array_keys($cartItems);
        $foundItems = victim::whereIn('id', $ids);
        $count      = $foundItems->count();
        $foundItems = $foundItems->get();
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

        return redirect(route('cart.index'))->with('success', 'Items added to cart');
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
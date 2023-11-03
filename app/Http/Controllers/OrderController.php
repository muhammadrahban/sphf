<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\SendAction;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function statusUpdate(Order $order, $status)
    {
        $user = User::find($order->user_id);
        $order->update(['status' => $status]);
        if ($status == 1) {
            event(new SendAction([$order->user_id], [
                'actor_id' => auth()->user()->id,
                'actor_type' => 'admin',
                'user_id' => $order->user_id,
                'object_id' => $order->id,
                'title' => 'order dispatched',
                'object_type' => 'App\Models\Order',
                'type' => 'order-dispatched',
                // 'media' => $media,
                // 'object_id' => '',
                'body' => "Your order has been successfully dispatched to your this  email address, " . " " . $user->email . " " . "  order#" . $order->order_number,
            ], true));
        }
        return redirect(route('nannies.info', $order->user_id))->with('message', 'order status updated successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\OrderShipped;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Order Event
     */
    public function order()
    {
        $order = Order::find(1);
        if ($order) {
            event(new OrderShipped($order));
            echo "Fire order.";
        } else {
            echo "Order not found.";
        }

        die();
    }
}

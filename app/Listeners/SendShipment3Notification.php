<?php

namespace App\Listeners;

use App\Events\OrderShipped;
use App\ReceivedOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendShipment3Notification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped  $event
     * @return void
     */
    public function handle(OrderShipped $event)
    {
        $receivedOrder = new ReceivedOrder();
        $receivedOrder->order_id = $event->order->id;
        $receivedOrder->from = 'SendShipment 3';
        $receivedOrder->save();
    }
}

<?php

namespace App\crm\customer\Listeners;

use App\crm\customer\Events\customerCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class notifySalesOnCustomerCreation{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(customerCreation $event):void
    {
       $customer= $event->getCustomer();
       dd($customer);
        // return $customer;
    }
}

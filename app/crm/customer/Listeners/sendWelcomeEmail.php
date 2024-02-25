<?php

namespace App\crm\customer\Listeners;

use App\crm\customer\Events\customerCreation;
use App\crm\customer\service\customerService;
use App\crm\project\event\projectCreation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendWelcomeEmail
{
    private customerService $customerService;
    /**
     * Create the event listener.
     */
    public function __construct(customerService $customerService)
    {
         $this->customerService= $customerService;
    }

    /**
     * Handle the event.
     */
    public function handle(projectCreation $event): void
    {
        $pro=$event->getproject();
        $customer=$this->customerService->view($pro->customer_id);
        dd($pro,$customer);
    }
}

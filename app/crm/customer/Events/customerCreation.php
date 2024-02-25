<?php

namespace App\crm\customer\Events;

use app\crm\customer\models\Customer;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class customerCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private Customer $customer;
    public function __construct(Customer $customer)
    {
        $this->setCustomer($customer);
    }
    public function setCustomer(Customer $customer)
    {
        $this->customer=$customer;
    }
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}

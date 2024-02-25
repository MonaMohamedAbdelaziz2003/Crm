<?php

// namespace App\crm\user\event;

// use app\crm\user\models\User;
// use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Broadcasting\PrivateChannel;
// use Illuminate\Foundation\Events\Dispatchable;
// use Illuminate\Queue\SerializesModels;

// class userCreation
// {
//     use Dispatchable, InteractsWithSockets, SerializesModels;

//     /**
//      * Create a new event instance.
//      */
//     private User $user;
//     public function __construct(User $user)
//     {
//         $this->setuser($user);
//     }
//     public function setuser(User $user)
//     {
//         $this->user=$user;
//     }
//     public function getuser()
//     {
//         return $this->user;
//     }

//     /**
//      * Get the channels the event should broadcast on.
//      *
//      * @return array<int, \Illuminate\Broadcasting\Channel>
//      */
//     public function broadcastOn(): array
//     {
//         return [
//             new PrivateChannel('channel-name'),
//         ];
//     }
// }

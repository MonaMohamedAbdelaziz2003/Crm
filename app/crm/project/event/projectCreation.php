<?php

namespace App\crm\project\event;

use app\crm\project\models\Project;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class projectCreation
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private Project $project;
    public function __construct(Project $project)
    {
        $this->setproject($project);
    }
    public function setproject(Project $project)
    {
        $this->project=$project;
    }
    public function getproject()
    {
        return $this->project;
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

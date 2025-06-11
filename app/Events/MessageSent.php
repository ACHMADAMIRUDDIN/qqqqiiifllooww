<?php

namespace App\Events;

use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        // Broadcast ke channel receiver dan sender agar realtime di kedua sisi
        return [
            new \Illuminate\Broadcasting\PrivateChannel('chat.' . $this->message->receiver_id),
            new \Illuminate\Broadcasting\PrivateChannel('chat.' . $this->message->sender_id),
        ];
    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message
        ];
    }

    public function broadcastAs()
    {

        // Nama event harus sama dengan yang di-listen di frontend
        return 'MessageSent';
    }
}

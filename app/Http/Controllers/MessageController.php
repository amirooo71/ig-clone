<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Notifications\MessageNotification;

class MessageController extends Controller
{
    public function store(Conversation $conversation)
    {

        $data = request()->validate(['body' => 'required|string|max:1000']);

        $receiver = $conversation->getReceiver();

        Message::create([
            'conversation_id' => $conversation->id,
            'body' => $data['body'],
            'sender_id' => auth()->id(),
            'receiver_id' => $receiver->id,
        ]);

        $receiver->notify(new MessageNotification());

        auth()->user()->notify(new MessageNotification());

        return back();

    }
}

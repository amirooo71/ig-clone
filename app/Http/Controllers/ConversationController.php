<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Inertia\Inertia;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = auth()->user()->conversation()->get();

        $conversations = $conversations->map(function ($conversation) {
            $conversation->receiver = $conversation->getReceiver();

            return $conversation;
        });

        return Inertia::render('Message/Index', ['conversations' => $conversations]);
    }

    public function show(Conversation $conversation)
    {

        $conversations = auth()->user()->conversation()->get();

        $conversations = $conversations->map(function ($conversation) {
            $conversation->receiver = $conversation->getReceiver();

            return $conversation;
        });

        $messages = Message::where('conversation_id', $conversation->id)->get();

        return Inertia::render('Message/Show', [
            'conversations' => $conversations,
            'conversation' => $conversation->getReceiver(),
            'cId' => $conversation->id,
            'messages' => $messages,
        ]);
    }

    public function create(User $user)
    {

        $authUser = auth()->id();

        $existConversation = Conversation::where(function ($query) use ($authUser, $user) {
            $query->where('sender_id', $authUser)
                ->Where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($authUser, $user) {
            $query->where('sender_id', $user->id)
                ->Where('receiver_id', $authUser);
        })->first();

        if ($existConversation) {
            return to_route('conversation.show', $existConversation->id);
        }

        $createdConversation = Conversation::create([
            'sender_id' => $authUser,
            'receiver_id' => $user->id,
        ]);

        return to_route('conversation.show', $createdConversation->id);
    }
}

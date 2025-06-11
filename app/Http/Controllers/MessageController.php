<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index', compact('users'));
    }

    public function fetch(User $user)
    {
        $messages = Message::where(function($q) use ($user) {
            $q->where('sender_id', Auth::id())->where('receiver_id', $user->id);
        })->orWhere(function($q) use ($user) {
            $q->where('sender_id', $user->id)->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        // Cegah pasien mengirim ke pasien lain, admin boleh ke siapa saja
        if (auth()->id() != 1) { // pasien
            if ($request->receiver_id != 1) {
                abort(403, 'Pasien hanya boleh chat ke admin');
            }
        } else { // admin
            if ($request->receiver_id == 1) {
                abort(403, 'Admin tidak boleh chat ke dirinya sendiri');
            }
        }

        $message = \App\Models\Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        broadcast(new \App\Events\MessageSent($message))->toOthers();

        return response()->json($message);
    }
}

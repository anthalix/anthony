<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FrontUser;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageAdminController extends Controller
{
    public function index()
    {
        // Récupère tous les utilisateurs ayant déjà envoyé un message
        $users = FrontUser::select('frontUser.*')
            ->addSelect([
                'unread_count' => Message::selectRaw('COUNT(*)')
                    ->join('contact_message', 'messages.id', '=', 'contact_message.message_id')
                    ->whereColumn('contact_message.frontUser_id', 'frontUser.id')
                    ->where('contact_message.is_read', false)
            ])
            ->with(['messages' => function ($q) {
                $q->orderBy('created_at', 'desc');
            }])
            ->get();

        return view('admin.messages.index', compact('users'));
    }

    public function show($userId)
    {
        $user = FrontUser::findOrFail($userId);
        $messages = $user->messages()->orderBy('messages.created_at', 'asc')->get();
        foreach ($messages as $message) {
            $message->pivot->is_read = true;
            $message->pivot->save();
        }
        return view('admin.messages.show', compact('user', 'messages'));
    }

    public function reply(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'user_id' => 'required|integer|exists:frontUser,id',
        ]);

        $message = Message::create([
            'content' => $request->content,
            'from_admin' => true, // tu peux ajouter cette colonne si tu veux différencier
        ]);

        $message->users()->attach($request->user_id);

        return redirect()->route('admin.messages.show', $request->user_id)
            ->with('success', 'Message envoyé');
    }
}

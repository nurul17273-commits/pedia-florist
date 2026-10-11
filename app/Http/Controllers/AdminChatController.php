<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminChatController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST CHAT + OPTIONAL ACTIVE USER
    |--------------------------------------------------------------------------
    */

    public function index($userId = null)
    {
        $users = User::whereHas('chats')
            ->with(['chats' => function ($q) {
                $q->latest();
            }])
            ->get();

        $activeUser = null;

        $messages = collect();

        if ($userId) {

            $activeUser = User::findOrFail($userId);

            $messages = Chat::where('user_id', $userId)
                ->orderBy('created_at', 'asc')
                ->get();
        }

        return view('admin.chat', compact(
            'users',
            'activeUser',
            'messages'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | OPEN SPECIFIC USER CHAT
    |--------------------------------------------------------------------------
    */

    public function show($userId)
    {
        $users = User::whereHas('chats')
            ->with(['chats' => function ($q) {
                $q->latest();
            }])
            ->get();

        $activeUser = User::findOrFail($userId);

        $messages = Chat::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.chat', compact(
            'users',
            'activeUser',
            'messages'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | SEND MESSAGE
    |--------------------------------------------------------------------------
    */

    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'message' => 'required|string'
        ]);

        Chat::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
            'role' => 'admin'
        ]);

        return redirect('/admin/chat/' . $request->user_id);
    }
}

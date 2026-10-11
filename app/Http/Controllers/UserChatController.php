<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Chat;

class UserChatController extends Controller
{

    /*
    |-----------------------------------------
    | USER - kirim pesan
    |-----------------------------------------
    */
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $chat = Chat::create([
            'user_id' => Auth::id(),
            'role' => 'user',
            'message' => $request->message
        ]);

        return response()->json($chat);
    }

    /*
    |-----------------------------------------
    | USER - ambil semua chat
    |-----------------------------------------
    */
    public function messages()
    {
        return Chat::where('user_id', Auth::id())
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /*
    |-----------------------------------------
    | ADMIN - list semua user yang chat
    |-----------------------------------------
    */
    public function adminUsers()
    {
        return Chat::select('user_id')
            ->distinct()
            ->get();
    }

    /*
    |-----------------------------------------
    | ADMIN - ambil chat per user
    |-----------------------------------------
    */
    public function adminMessages($userId)
    {
        return Chat::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    /*
    |-----------------------------------------
    | ADMIN - kirim pesan
    |-----------------------------------------
    */
    public function adminSend(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'message' => 'required|string'
        ]);

        $chat = Chat::create([
            'user_id' => $request->user_id,
            'role' => 'admin',
            'message' => $request->message
        ]);

        return response()->json($chat);
    }
}

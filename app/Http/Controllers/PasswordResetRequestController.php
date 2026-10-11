<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordResetRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PasswordResetRequestController extends Controller
{
    // user submit request
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        PasswordResetRequest::create([
            'email' => $request->email
        ]);

        return back()->with(
    'success',
    'Permintaan reset password telah masuk ke admin dan sedang menunggu persetujuan.'
);
    }

    // halaman admin
    public function index()
    {
        $requests = PasswordResetRequest::latest()->get();

        return view('admin.permintaan-akun', compact('requests'));
    }

    // approve admin
    public function approve($id)
    {
        $req = PasswordResetRequest::findOrFail($id);

        $token = Str::random(64);

        $req->update([
            'status' => 'approved',
            'token' => $token
        ]);

        return back()->with('success', 'Request disetujui.');
    }

    public function reject($id)
{
    $req = PasswordResetRequest::findOrFail($id);

    $req->update([
        'status' => 'rejected'
    ]);

    return back()->with('success', 'Request ditolak.');
}

    // tampil form reset
    public function showResetForm($token)
    {
        $req = PasswordResetRequest::where('token', $token)
                ->where('status', 'approved')
                ->firstOrFail();

        return view('auth.reset-password', compact('token'));
    }

    // update password
    public function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        $req = PasswordResetRequest::where('token', $token)
                ->where('status', 'approved')
                ->firstOrFail();

        $user = User::where('email', $req->email)->firstOrFail();

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $req->delete();

        return redirect('/')->with('success', 'Password berhasil diubah.');
    }
}

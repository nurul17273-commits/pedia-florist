<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\PasswordResetRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GOOGLE LOGIN
    |--------------------------------------------------------------------------
    */

    public function google()
    {
        return Socialite::driver('google')
            ->stateless()
            ->with([
                'prompt' => 'select_account'
            ])
            ->redirect();
    }

    public function googleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')
                ->stateless()
                ->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => Hash::make(Str::random(32)),
                    'role' => 'user'
                ]);
            }

            Auth::login($user);

            session([
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $googleUser->getAvatar(),
                ]
            ]);

            // CEK RESET WAJIB
            $reset = $this->checkApprovedReset($user->email);

            if ($reset) {
                return redirect($reset);
            }

            return $this->redirectByRole($user);

        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Login Google gagal.');
        }
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN FORM
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        return view('Auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PROCESS
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // =========================
        // RESET PRIORITY CHECK
        // =========================
        if ($user) {
            $reset = $this->checkApprovedReset($user->email);

            if ($reset) {

                // boleh login paksa supaya bisa reset password
                Auth::login($user);

                return redirect($reset)
                    ->with('success', 'Silakan reset password Anda terlebih dahulu.');
            }
        }

        // LOGIN NORMAL
        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();

            $user = Auth::user();

            return $this->redirectByRole($user);
        }

        return back()->with('error', 'Email atau password salah.');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user'
        ]);

        return redirect('/')->with('success', 'Akun berhasil dibuat!');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget('user');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER: CHECK RESET
    |--------------------------------------------------------------------------
    */

    private function checkApprovedReset($email)
    {
        $reset = PasswordResetRequest::where('email', $email)
            ->where('status', 'approved')
            ->latest()
            ->first();

        return $reset ? '/reset-password/' . $reset->token : null;
    }

    /*
    |--------------------------------------------------------------------------
    | HELPER: REDIRECT ROLE
    |--------------------------------------------------------------------------
    */

    private function redirectByRole($user)
    {
        if ($user->role === 'admin') {
            return redirect('/home');
        }

        return redirect('/beranda');
    }
}

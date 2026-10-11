<?php

use Illuminate\Support\Facades\Route;

// AUTH
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetRequestController;

// USER
use App\Http\Controllers\AIController;
use App\Http\Controllers\FlowerUserController;
use App\Http\Controllers\ChatAIController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserChatController;
use App\Http\Controllers\ComplaintController;

// ADMIN
use App\Http\Controllers\AdminAIController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\AdminChatController;

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

// Google Login
Route::get('/auth/google', [AuthController::class, 'google']);
Route::get('/auth/google/callback', [AuthController::class, 'googleCallback']);

// Login
Route::get('/', [AuthController::class, 'loginForm'])
    ->name('login');

Route::post('/', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

// Register
Route::get('/register', function () {
    return view('Auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

// Recovery
Route::get('/recovery', function () {
    return view('Auth.recovery');
});

// Forgot Password
Route::post('/forgot-password-request', [
    PasswordResetRequestController::class,
    'store'
])->name('password.request.store');

// Reset Password
Route::get('/reset-password/{token}', [
    PasswordResetRequestController::class,
    'showResetForm'
])->name('password.reset');

Route::post('/reset-password/{token}', [
    PasswordResetRequestController::class,
    'resetPassword'
])->name('password.update');

// Dukungan
Route::get('/dukungan', function () {
    return view('Auth.dukungan');
});

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/home', [DashboardController::class, 'index'])
    ->name('dashboard');

// Tanaman
Route::get('/tanaman', [PlantController::class, 'index'])
    ->name('plants.index');

Route::post('/katalog-tanaman', [PlantController::class, 'store'])
    ->name('plants.store');

Route::delete('/katalog-tanaman/{id}', [PlantController::class, 'destroy'])
    ->name('plants.destroy');

// AI Admin
Route::get('/AI', [AdminAIController::class, 'index'])
    ->name('admin.ai');

// Permintaan Akun
Route::get('/akun', [
    PasswordResetRequestController::class,
    'index'
])->name('admin.account.requests');

Route::post('/akun/{id}/approve', [
    PasswordResetRequestController::class,
    'approve'
])->name('admin.account.approve');

Route::post('/akun/{id}/reject', [
    PasswordResetRequestController::class,
    'reject'
])->name('admin.account.reject');

// Chat Admin
Route::get('/admin/chat', [
    AdminChatController::class,
    'index'
]);

Route::get('/admin/chat/{userId}', [
    AdminChatController::class,
    'index'
]);

Route::post('/admin/chat/send', [
    AdminChatController::class,
    'send'
]);

/*
|--------------------------------------------------------------------------
| COMPLAINT / KELUHAN
|--------------------------------------------------------------------------
*/

// ADMIN
Route::get('/keluhan', [
    ComplaintController::class,
    'index'
])->name('complaint.index');

Route::post('/keluhan/{id}/process', [
    ComplaintController::class,
    'process'
])->name('complaint.process');

Route::get(
    '/admin/complaints/pdf',
    [ComplaintController::class, 'downloadPdf']
)->name('admin.complaints-pdf');

// USER
Route::post('/complaint/send', [
    ComplaintController::class,
    'store'
])->name('complaint.store');

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

// Beranda
Route::get('/beranda', function () {
    return view('home');
});

// Panduan
Route::get('/panduan', function () {
    return view('panduan');
});

Route::get('/d.panduan', function () {
    return view('detailpanduan');
});

// Chat AI
Route::post('/chat-ai', [ChatAIController::class, 'chat']);

// Jenis Tanaman
Route::get('/jenis', [FlowerUserController::class, 'index'])
    ->name('user.flowers');

// Jadwal
Route::get('/jadwal', [ScheduleController::class, 'index']);

Route::post('/jadwal', [ScheduleController::class, 'store']);

Route::delete('/jadwal/{id}', [ScheduleController::class, 'destroy']);

// Tentang
Route::get('/tentang', function () {
    return view('tentang');
});

// Chat User
Route::get('/chat', function () {
    return view('chat');
});

Route::post('/chat/send', [
    UserChatController::class,
    'send'
]);

Route::get('/chat/messages', [
    UserChatController::class,
    'messages'
]);

// FAQ
Route::get('/faq', function () {
    return view('FAQ');
});

// Kontak
Route::get('/kontak', function () {
    return view('kontak');
});

// Syarat
Route::get('/syarat', function () {
    return view('syarat');
});

// AI Analyze
Route::post('/analyze', [
    AIController::class,
    'analyze'
]);


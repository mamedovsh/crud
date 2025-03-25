<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Mail\Welcome;
use App\Models\User;


Route::get('/users', [UsersController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/send-welcome-email', function () {
    
    $user = User::find(1); 
    
    if ($user) {
    Mail::to($user->email)->send(new Welcome($user));
    return 'Welcome email has been sent!';
    }
    
    return 'User not found.';
    });

    Route::get('test-telegram', function () {
        Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'html',
        'text' => 'Произошло тестовое событие'
        ]);
        return response()->json([
        'status' => 'success'
        ]);
        });
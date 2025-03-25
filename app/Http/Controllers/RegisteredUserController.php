<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail; // Импорт класса почтового шаблона
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisteredUserController extends Controller
{
    use RegistersUsers;

    protected function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

       
        Mail::to($user->email)->send(new WelcomeMail($user));

        
        return redirect()->route('home')->with('success', 'Регистрация успешна!');

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'html',
            'text' => "Новый пользователь зарегистрирован: " . $request->input('name')
        ]);
    }
}
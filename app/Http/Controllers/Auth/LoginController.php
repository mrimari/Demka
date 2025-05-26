<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string', 'min:6', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'password' => ['required', 'string', 'min:6'],
        ], [
            'login.regex' => 'Логин должен содержать только кириллические буквы и пробелы.',
        ]);

        if (Auth::attempt(['login' => $credentials['login'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->intended(route('applications.index'));
        }

        return back()->withInput()->with('error', 'Неверный логин или пароль.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
} 
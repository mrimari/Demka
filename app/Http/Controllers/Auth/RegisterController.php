<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'login' => ['required', 'string', 'min:6', 'unique:users,login', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'fio' => ['required', 'string', 'regex:/^[А-Яа-яЁё\s]+$/u'],
            'phone' => ['required', 'regex:/^\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}$/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'login.regex' => 'Логин должен содержать только кириллические буквы и пробелы.',
            'fio.regex' => 'ФИО должно содержать только кириллические буквы и пробелы.',
            'phone.regex' => 'Телефон должен быть в формате +7(XXX)-XXX-XX-XX.',
        ]);

        $user = User::create([
            'login' => $validated['login'],
            'fio' => $validated['fio'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['fio'],
        ]);
        Auth::login($user);
        return redirect()->route('applications.index');
    }
} 
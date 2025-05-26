@extends('layouts.app')

@section('content')
    <h1>Вход</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label>Логин:</label>
            <input type="text" name="login" value="{{ old('login') }}">
            @error('login')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Пароль:</label>
            <input type="password" name="password">
            @error('password')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        @if(session('error'))
            <div style="color:red">{{ session('error') }}</div>
        @endif
        <button type="submit">Войти</button>
    </form>
    <a href="{{ route('register') }}">Регистрация</a>
@endsection 
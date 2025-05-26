@extends('layouts.app')

@section('content')
    <h1>Регистрация</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label>Логин (кириллица, не менее 6 символов):</label>
            <input type="text" name="login" value="{{ old('login') }}">
            @error('login')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>ФИО (кириллица, пробелы):</label>
            <input type="text" name="fio" value="{{ old('fio') }}">
            @error('fio')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Телефон (+7(XXX)-XXX-XX-XX):</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
            @error('phone')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Пароль (не менее 6 символов):</label>
            <input type="password" name="password">
            @error('password')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Подтверждение пароля:</label>
            <input type="password" name="password_confirmation">
        </div>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <a href="{{ route('login') }}">Уже есть аккаунт?</a>
@endsection 
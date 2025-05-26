<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информационная система</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        @auth
            <a href="{{ route('applications.index') }}">Мои заявки</a>
            @can('isAdmin')
                <a href="{{ route('admin.index') }}">Панель администратора</a>
            @endcan
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        @else
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Регистрация</a>
        @endauth
    </nav>
    <hr>
    @yield('content')
</body>
</html> 
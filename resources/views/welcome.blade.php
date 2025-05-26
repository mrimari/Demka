<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать!</title>
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc, #cfdef3);
            font-family: 'Segoe UI', Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 40px 32px;
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: #2d3a4b;
            margin-bottom: 10px;
        }
        p {
            color: #4b5d6b;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            margin: 8px 12px;
            padding: 12px 32px;
            border-radius: 8px;
            border: none;
            background: #4f8cff;
            color: #fff;
            font-size: 1.1em;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Информационная система заявок</h1>
        <p>Добро пожаловать в систему оформления заявок на тест-драйв!<br>
        Зарегистрируйтесь или войдите, чтобы воспользоваться всеми возможностями.</p>
        <a href="{{ route('login') }}" class="btn">Войти</a>
        <a href="{{ route('register') }}" class="btn">Регистрация</a>
    </div>
</body>
</html>

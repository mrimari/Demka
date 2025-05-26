@extends('layouts.app')

@section('content')
    <h1>Мои заявки</h1>
    <a href="{{ route('applications.create') }}">Создать новую заявку</a>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Авто</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
        @foreach($applications as $app)
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->date }}</td>
                <td>{{ $app->time }}</td>
                <td>{{ $app->car_brand }} {{ $app->car_model }}</td>
                <td>{{ $app->status }}</td>
                <td><a href="{{ route('applications.show', $app) }}">Подробнее</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection 
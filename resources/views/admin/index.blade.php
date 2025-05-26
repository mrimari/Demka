@extends('layouts.app')

@section('content')
    <h1>Все заявки</h1>
    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Пользователь</th>
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
                <td>{{ $app->user->name ?? '—' }}</td>
                <td>{{ $app->date }}</td>
                <td>{{ $app->time }}</td>
                <td>{{ $app->car_brand }} {{ $app->car_model }}</td>
                <td>{{ $app->status }}</td>
                <td><a href="{{ route('admin.edit', $app) }}">Изменить статус</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection 
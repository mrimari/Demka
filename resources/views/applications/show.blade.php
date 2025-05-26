@extends('layouts.app')

@section('content')
    <h1>Заявка №{{ $application->id }}</h1>
    <ul>
        <li><b>Адрес:</b> {{ $application->address }}</li>
        <li><b>Телефон:</b> {{ $application->phone }}</li>
        <li><b>Дата:</b> {{ $application->date }}</li>
        <li><b>Время:</b> {{ $application->time }}</li>
        <li><b>Серия ВУ:</b> {{ $application->driver_license_series }}</li>
        <li><b>Номер ВУ:</b> {{ $application->driver_license_number }}</li>
        <li><b>Дата выдачи ВУ:</b> {{ $application->driver_license_issue_date }}</li>
        <li><b>Марка авто:</b> {{ $application->car_brand }}</li>
        <li><b>Модель авто:</b> {{ $application->car_model }}</li>
        <li><b>Тип оплаты:</b> {{ $application->payment_type == 'cash' ? 'Наличные' : 'Карта' }}</li>
        <li><b>Статус:</b> {{ $application->status }}</li>
        @if($application->admin_comment)
            <li><b>Комментарий администратора:</b> {{ $application->admin_comment }}</li>
        @endif
    </ul>
    <a href="{{ route('applications.index') }}">Назад к списку</a>
@endsection 
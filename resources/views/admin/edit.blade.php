@extends('layouts.app')

@section('content')
    <h1>Изменить статус заявки №{{ $application->id }}</h1>
    <form method="POST" action="{{ route('admin.update', $application) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Статус:</label>
            <select name="status">
                <option value="approved" @if($application->status=='approved') selected @endif>Одобрено</option>
                <option value="rejected" @if($application->status=='rejected') selected @endif>Отклонено</option>
            </select>
            @error('status')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Комментарий администратора (причина отклонения):</label>
            <textarea name="admin_comment">{{ old('admin_comment', $application->admin_comment) }}</textarea>
            @error('admin_comment')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <button type="submit">Сохранить</button>
    </form>
    <a href="{{ route('admin.index') }}">Назад к списку</a>
@endsection 
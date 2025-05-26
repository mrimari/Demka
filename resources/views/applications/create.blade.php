@extends('layouts.app')

@section('content')
    <h1>Создать заявку</h1>
    <form method="POST" action="{{ route('applications.store') }}">
        @csrf
        <div>
            <label>Адрес:</label>
            <input type="text" name="address" value="{{ old('address') }}">
            @error('address')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Телефон (+7(XXX)-XXX-XX-XX):</label>
            <input type="text" name="phone" value="{{ old('phone') }}">
            @error('phone')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Дата:</label>
            <input type="date" name="date" value="{{ old('date') }}">
            @error('date')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Время:</label>
            <input type="time" name="time" value="{{ old('time') }}">
            @error('time')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Серия ВУ:</label>
            <input type="text" name="driver_license_series" value="{{ old('driver_license_series') }}">
            @error('driver_license_series')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Номер ВУ:</label>
            <input type="text" name="driver_license_number" value="{{ old('driver_license_number') }}">
            @error('driver_license_number')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Дата выдачи ВУ:</label>
            <input type="date" name="driver_license_issue_date" value="{{ old('driver_license_issue_date') }}">
            @error('driver_license_issue_date')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Марка авто:</label>
            <select name="car_brand" id="car_brand_select">
                <option value="">Выберите марку</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->name }}" data-id="{{ $brand->id }}" @if(old('car_brand')==$brand->name) selected @endif>{{ $brand->name }}</option>
                @endforeach
            </select>
            @error('car_brand')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Модель авто:</label>
            <select name="car_model" id="car_model_select">
                <option value="">Выберите модель</option>
                @foreach($models as $model)
                    <option value="{{ $model->name }}" data-brand="{{ $model->brand_id }}" @if(old('car_model')==$model->name) selected @endif>{{ $model->name }}</option>
                @endforeach
            </select>
            @error('car_model')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label>Тип оплаты:</label>
            <select name="payment_type">
                <option value="cash" @if(old('payment_type')=='cash') selected @endif>Наличные</option>
                <option value="card" @if(old('payment_type')=='card') selected @endif>Карта</option>
            </select>
            @error('payment_type')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <div>
            <label><input type="checkbox" name="agreement" {{ old('agreement') ? 'checked' : '' }}> Я ознакомлен с правилами предоставления услуги</label>
            @error('agreement')<div style="color:red">{{ $message }}</div>@enderror
        </div>
        <button type="submit">Отправить заявку</button>
    </form>
    <a href="{{ route('applications.index') }}">Назад к списку</a>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const brandSelect = document.getElementById('car_brand_select');
        const modelSelect = document.getElementById('car_model_select');
        function filterModels() {
            const brandId = brandSelect.options[brandSelect.selectedIndex].getAttribute('data-id');
            Array.from(modelSelect.options).forEach(option => {
                if (!option.value) return;
                option.style.display = option.getAttribute('data-brand') === brandId ? '' : 'none';
            });
            modelSelect.value = '';
        }
        brandSelect.addEventListener('change', filterModels);
        filterModels();
    });
</script>
@endpush 
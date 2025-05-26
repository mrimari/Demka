<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\CarBrand;
use App\Models\CarModel;

class ApplicationController extends Controller
{
    // Список заявок пользователя
    public function index()
    {
        $applications = Auth::user()->applications()->latest()->get();
        return view('applications.index', compact('applications'));
    }

    // Форма создания заявки
    public function create()
    {
        $brands = CarBrand::with('models')->get();
        $models = CarModel::all();
        return view('applications.create', compact('brands', 'models'));
    }

    // Сохранение заявки
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|regex:/^\\+7\\(\\d{3}\\)\\-\\d{3}\\-\\d{2}\\-\\d{2}$/',
            'date' => 'required|date',
            'time' => 'required',
            'driver_license_series' => 'required|string|max:20',
            'driver_license_number' => 'required|string|max:20',
            'driver_license_issue_date' => 'required|date',
            'car_brand' => 'required|string|max:50',
            'car_model' => 'required|string|max:50',
            'payment_type' => 'required|in:cash,card',
            'agreement' => 'accepted',
        ]);
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';
        $validated['agreement'] = $request->has('agreement') ? 1 : 0;
        Application::create($validated);
        return redirect()->route('applications.index')->with('success', 'Заявка успешно отправлена!');
    }

    // Просмотр одной заявки
    public function show(Application $application)
    {
        $this->authorize('view', $application);
        return view('applications.show', compact('application'));
    }
} 
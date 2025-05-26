<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class AdminController extends Controller
{
    // Список всех заявок
    public function index()
    {
        $applications = Application::latest()->get();
        return view('admin.index', compact('applications'));
    }

    // Форма редактирования статуса заявки
    public function edit(Application $application)
    {
        return view('admin.edit', compact('application'));
    }

    // Обновление статуса заявки
    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'admin_comment' => 'nullable|string',
        ]);
        $application->update($validated);
        return redirect()->route('admin.index')->with('success', 'Статус заявки обновлён!');
    }
} 
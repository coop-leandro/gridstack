<?php

use App\Livewire\DashboardEditor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardEditor::class, 'mount']);

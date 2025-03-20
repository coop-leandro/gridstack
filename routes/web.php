<?php

use App\Livewire\DashboardEditor;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardEditor::class, 'mount']);
Route::view('/upload', 'upload');

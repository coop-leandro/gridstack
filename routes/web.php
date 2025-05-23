<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SetorController;
use App\Livewire\DashboardEditor;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/dashboard', [DashboardEditor::class, 'mount'])->name('dashboard');

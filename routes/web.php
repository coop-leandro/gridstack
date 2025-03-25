<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SetorController;
use App\Livewire\DashboardEditor;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');

Route::get('/dashboard', [DashboardEditor::class, 'mount'])->name('dashboard');
Route::get('/setores/create', [SetorController::class, 'create'])->name('setores.create');
Route::post('/setores', [SetorController::class, 'store'])->name('setores.store');
Route::get('/setores/{setor}/usuarios', [SetorController::class, 'usuarios'])->name('setores.users');
Route::post('/setores/{setor}/usuarios', [SetorController::class, 'adicionarUsuarios'])->name('setores.adicionarUsuarios');
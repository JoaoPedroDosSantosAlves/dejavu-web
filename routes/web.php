<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Rotas de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de registro
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.form'); // Rota GET para exibir o formulário
Route::post('/register', [RegisteredUserController::class, 'register'])->name('register'); // Rota POST para processar o registro

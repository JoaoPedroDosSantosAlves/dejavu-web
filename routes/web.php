<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// Rotas de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de registro
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.form'); // Rota GET para exibir o formulário
Route::post('/register', [RegisteredUserController::class, 'register'])->name('register'); // Rota POST para processar o registro

// Rotas de esqueceu senha
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

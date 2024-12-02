<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\TasksController;

// Rota de login
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

// Rotas públicas
Route::get('/', function () {
    return view('index'); // Certifique-se de ter o arquivo index.blade.php em resources/views
})->name('index');

Route::get('/contatos', function () {
    return view('contacts'); // Certifique-se de ter o arquivo contatos.blade.php em resources/views
})->name('contacts');

Route::get('/about-us', function () {
    return view('about-us'); // Certifique-se de ter o arquivo about-us.blade.php em resources/views
})->name('about-us');

// Rota protegida - home
Route::middleware('auth')->get('/home', function () {
    return view('home'); // Exibe a view home.blade.php
})->name('home');

Route::middleware('auth')->get('/library', function () {
    return view('library'); 
})->name('library');

Route::middleware('auth')->get('/quiz', function () {
    return view('quiz'); 
})->name('quiz');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TasksController::class);
    Route::resource('rooms', TasksController::class);
});

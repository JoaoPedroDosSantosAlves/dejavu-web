<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CalendarController;

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
    // Rotas para Cards
    Route::resource('cards', CardController::class);

    // Rotas para Tasks vinculadas a Cards
    Route::resource('cards.tasks', TaskController::class)->shallow();
    // Rota para deletar card
    Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('cards.destroy');
});

Route::get('/home', [CardController::class, 'index'])->name('home');

Route::post('tasks/{cardId}/store', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');

Route::delete('/cards/{id}', [CardController::class, 'destroy'])->name('cards.destroy');

// Rota para listar as tarefas do card

Route::resource('tasks', TaskController::class);
Route::get('tasks/list/{cardId}', [TaskController::class, 'list']); // Para listar as tarefas de um card
Route::post('tasks/{cardId}/store', [TaskController::class, 'store']); // Para criar uma nova tarefa
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    Route::get('/calendar/tasks/{date}', [CalendarController::class, 'getTasksForDate'])->name('calendar.tasks');
});
Route::post('/tasks/{task}/complete', [TaskController::class, 'complete']);

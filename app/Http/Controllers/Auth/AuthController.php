<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para exibir o formulário de login
    public function showLoginForm()
    {
        return view('auth.login'); // Altere para a sua view de login
    }

    // Método para realizar o login
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
    } else {
        return redirect()->back()->with('error', 'E-mail ou senha incorretos. Tente novamente.');
    }
}
    // Método para realizar o logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout realizado com sucesso!');
    }
}

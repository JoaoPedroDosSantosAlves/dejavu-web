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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticação bem-sucedida
            return redirect()->intended('home')->with('success', 'Login realizado com sucesso!');
        }

        // Se falhar, redireciona de volta com erro
        return redirect()->back()->withErrors(['email' => 'As credenciais fornecidas estão incorretas.']);
    }

    // Método para realizar o logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout realizado com sucesso!');
    }
}

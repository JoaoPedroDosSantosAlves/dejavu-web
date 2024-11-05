<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    // Método para exibir o formulário de registro
    public function create()
    {
        return view('auth.register'); // A view deve estar em resources/views/auth/register.blade.php
    }

    // Método para processar o registro
    public function register(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Criação do usuário
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redireciona após o cadastro
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso. Você pode fazer login.');
    }
}


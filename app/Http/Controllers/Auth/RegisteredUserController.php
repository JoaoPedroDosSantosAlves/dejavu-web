<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|min:4',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Cadastro bem-sucedido
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

        // Redireciona após o cadastro
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso. Você pode fazer login.');
    }
}


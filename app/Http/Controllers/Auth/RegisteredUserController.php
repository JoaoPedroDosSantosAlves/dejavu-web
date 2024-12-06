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

    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    // Método para processar o registro
    public function register(Request $request)
    {
        // Validação das senhas com mensagens personalizadas
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password', // A validação 'same' verifica se as senhas coincidem
        ], [
            'password_confirmation.same' => 'As senhas não coincidem', // Mensagem personalizada para a regra 'same'
        ]);

        // Se passar na validação, cria o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redireciona com mensagem de sucesso
        return redirect()->route('register')->with('success', 'Sua conta foi criada com sucesso!');
    }
}

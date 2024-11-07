<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ResetPasswordController extends Controller
{
    /**
     * Exibe o formulário para redefinir a senha.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => $request->email]);
    }

    /**
     * Processa a redefinição de senha.
     */
    public function reset(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Tenta redefinir a senha
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = bcrypt($request->password);
                $user->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Sua senha foi redefinida com sucesso.');
        }

        return back()->withErrors(['email' => 'Ocorreu um erro ao tentar redefinir sua senha.']);
    }
}

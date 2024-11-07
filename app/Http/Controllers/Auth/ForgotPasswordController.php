<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    /**
     * Exibe o formulário de solicitação de redefinição de senha.
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password'); // Exibe o formulário para o usuário
    }

    /**
     * Envia o e-mail de redefinição de senha.
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validação do e-mail
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',  // Verifica se o e-mail existe no banco de dados
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Envia o link de redefinição de senha
        $status = Password::sendResetLink(
            $request->only('email') // Pega o e-mail enviado no formulário
        );

        // Se o envio for bem-sucedido
        if ($status == Password::RESET_LINK_SENT) {
            return redirect()->route('login')->with('status', 'E-mail de redefinição enviado com sucesso.');
        }

        // Caso contrário
        return back()->withErrors(['email' => 'Ocorreu um erro ao tentar enviar o link de redefinição.']);
    }
}

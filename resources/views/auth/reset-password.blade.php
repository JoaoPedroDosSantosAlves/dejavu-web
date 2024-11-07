<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>resetar senha</title>
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <main>
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <div class="actual-form">
                        <img src="{{ asset('/images/logo.png') }}" id="logo-img" alt="Logo" />
                        <p class="aviso">Digite sua nova senha para concluir a alteração</p>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="input-wrap">
                                <input type="password" name="password" class="input-field" required />
                                <label for="password">Nova Senha</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password_confirmation" class="input-field" required />
                                <label for="password_confirmation">Confirme a Senha</label>
                            </div>

                            <input type="submit" value="Redefinir Senha" class="sign-btn" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('js/reset-password.js') }}"></script>
</body>

</html>
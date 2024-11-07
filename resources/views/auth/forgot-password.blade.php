<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Esqueci a Senha</title>
  <link rel="stylesheet" href="{{ asset('css/forgot-password.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="{{ route('password.email') }}" method="POST" autocomplete="off" class="sign-in-form">
            @csrf
            <div class="actual-form">
              <img src="{{ asset('/images/logo.png') }}" id="logo-img" alt="Logo" />
              <p class="aviso">Digite o e-mail vinculado à sua conta para enviarmos o token de recuperação</p>
              <div class="input-wrap">
                <input
                  type="email"
                  id="email"
                  name="email"
                  class="input-field"
                  autocomplete="off"
                  required
                />
                <label for="email">E-mail</label>
              </div>
              <input type="submit" value="Enviar Token" class="sign-btn" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="{{ asset('js/forgot-password.js') }}"></script>
  </body>
</html>

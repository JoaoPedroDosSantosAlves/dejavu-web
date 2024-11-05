<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
  <main>
    <div class="box">
      <div class="inner-box">
        <div class="forms-wrap">
          <form action="{{ route('login') }}" method="POST" autocomplete="off" class="sign-in-form">
            @csrf
            <div class="logo">
              <img src="{{ asset('/images/logo.png') }}" alt="easyclass" />
              <h4>DEJAVU</h4>
            </div>

            <div class="heading">
              <h3>Seja Bem-Vindo!</h3>
              <h6>Novo por aqui?</h6>
              <a href="{{ route('register') }}" class="toggle">Crie uma conta</a>
            </div>

            <div class="actual-form">
              <div class="input-wrap">
                <input type="text" name="email" minlength="4" class="input-field" autocomplete="off" required />
                <label>E-mail</label>
              </div>

              <div class="input-wrap">
                <input type="password" name="password" minlength="4" class="input-field" autocomplete="off" required />
                <label>Senha</label>
              </div>
              
              <p class="text">                 
                <a id="lbl-help" href="#">Esqueceu a Senha?</a>
              </p>

              <input type="submit" value="Entrar" class="sign-btn" />

            </div>
          </form>
        </div>

        <div class="carousel">
          <div class="images-wrapper">
            <img src="{{ asset('images/board.png') }}" class="image img-1 show" alt="Imagem 1" />
            <img src="{{ asset('images/green-clocks.png') }}" class="image img-2" alt="Imagem 2" />
            <img src="{{ asset('images/logo.png') }}" class="image img-3" alt="Imagem 3" />
          </div>

          <div class="text-slider">
            <div class="text-wrap">
              <div class="text-group">
                <h2>Organize suas tarefas</h2>
                <h2>Faça do seu jeito e no seu tempo</h2>
                <h2>Use o dejavu</h2>
              </div>
            </div>

            <div class="bullets">
              <span class="active" data-value="1"></span>
              <span data-value="2"></span>
              <span data-value="3"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Javascript file -->
  <script src="{{ asset('js/register.js') }}"></script>
</html>


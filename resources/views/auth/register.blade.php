<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastrar-se dejavu</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <main>
        <!-- Mensagens de erro -->
        @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Mensagem de sucesso -->
        @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <form action="{{ route('register') }}" method="POST" autocomplete="off" class="sign-up-form">
                        @csrf
                        <a href="{{ route('index')}}" class="logo" style="text-decoration: none;">
                            <img src="{{ asset('/images/logo.png') }}" alt="easyclass" />
                            <h4>DEJAVU</h4>
                        </a>

                        <div class="heading">
                            <h2>Vamos Começar</h2>
                            <h6>Já possui uma conta?</h6>
                            <a href="{{ route('login') }}" class="toggle">Entre</a>
                        </div>

                        <div class="actual-form">
                            <div class="input-wrap">
                                <input type="text" name="name" minlength="4" class="input-field" autocomplete="off" value="{{ old('name') }}" required />
                                <label>Nome</label>
                            </div>

                            <div class="input-wrap">
                                <input type="email" name="email" minlength="4" class="input-field" autocomplete="off" value="{{ old('email') }}" required />
                                <label>E-mail</label>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password" id="password" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Senha</label>
                                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i>
                            </div>

                            <div class="input-wrap">
                                <input type="password" name="password_confirmation" id="password_confirmation" minlength="4" class="input-field" autocomplete="off" required />
                                <label>Confirme a Senha</label>
                                <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password_confirmation')"></i>
                            </div>

                            <input type="submit" value="Criar Conta" class="sign-btn" />

                            <p class="text">
                                Ao me inscrever, concordo com os
                                <a href="#">Termos de Serviço</a> e
                                <a href="#">Política de Privacidade</a>
                            </p>
                        </div>
                    </form>
                </div>

                <div class="carousel">
                    <div class="images-wrapper">
                        <img src="{{ asset('images/board.png') }}" class="image img-1 show" alt="" />
                        <img src="{{ asset('images/green-clocks.png') }}" class="image img-2 alt=""/> 
                        <img src=" {{ asset('images/logo.png') }}" class="image img-3 alt=""/> 
                    </div>

                    <div class=" text-slider">
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
    <script src="{{ asset('js/register-login.js') }}"></script>
</body>

</html>
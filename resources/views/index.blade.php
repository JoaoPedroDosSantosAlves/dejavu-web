<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <title>Dejavu</title>
</head>

<body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg bg-transparent ">
        <div class="container">
            <!--Logo-->
            <img src="{{ asset('/images/writelogo.png') }}" alt="Logo Dejavu" class="logo-img">
            <!--Toggle Button-->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--SideBar-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvas-navbar"
                aria-labelledby="offcanvas-navbar-label">
                <div class="offcanvas-header">
                    <img src="{{ asset('/images/index-woman.png') }}" alt="Logo Dejavu" class="logo-img-sidebar"
                        style="margin-top: 15px;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts') }}">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about-us')}}">Sobre Nós</a>
                        </li>
                    </ul>

                    <!--Login // Sign Up-->
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <a href="{{ route('register') }}" class="register-button">Junte-se a Nós</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
    <!--Hero Section-->
    <section class="hero-section">
        <div class="content-2">
            <h1 class="title">O Primeiro<br>Passo Para<br>Mudar</h1>
            <div class="buttons">
                <a href="{{ route('login') }}" class="button primary">Comece por aqui</a>

            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('/images/index-woman.png') }}" alt="teste" style="width: 449px; height: 509px;">
        </div>
    </section>
    <!--End Hero Section-->


    <!--image slider start-->
    <div class="slider">
        <div class="slides">
            <!--radio buttons start-->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!--radio buttons end-->

            <!--slide images start-->
            <div class="slide first">
                <img src="{{ asset('/images/screen-register.png') }}" alt="">
            </div>
            <div class="slide">
                <img src="{{ asset('/images/screen-menu.png') }}" alt="">
            </div>
            <div class="slide">
                <img src="{{ asset('/images/screen-calendar.png') }}" alt="">
            </div>
            <!--slide images end-->

            <!--automatic navigation start-->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>
            <!--automatic navigation end-->
        </div>
    </div>
    <!--image slider end-->

    <!--Seção de texto 1-->
    <section class="text-section">
        <div class="content">
            <h1 class="title-2">O Segredo para <br> atingir seus <br> objetivos diários</h1>
            <p class="description">Pensamos sobre como o Dejavu pudesse <br> levar alívio para sua mente. Registrar e
                <br>
                organizar as tarefas de maneira produtiva <br> e assim reduzindo o estresse.
            </p>
        </div>
        <div class="image-section">
            <img src="{{ asset('/images/post-it.png') }}" alt="teste">
        </div>
    </section>
    <!--Fim da Seção de texto 1-->

    <!--Seção de texto 2-->
    <section class="text-section2">
        <div class="content">
            <h1 class="title-3">O Poder da <br> Organização no <br> Dia-a-Dia</h1>
            <p class="description-2">Definir e acompanhar seu objetivo torna <br> seu dia-a-dia mais organizado. Com a
                <br>nossa
                ferramenta de visualização seus <br> objetivos se tornam amigáveis.
            </p>
        </div>
        <div class="image-section2">
            <img src="{{ asset('/images/calendar.png') }}" alt="teste">
        </div>
    </section>
    <!--Fim da Seção de texto 2-->

    <!--Seção de texto 3-->
    <section class="text-section3">
        <div class="content">
            <h1 class="title-4">Fique por dentro <br> do nosso blog <br> exclusivo</h1>
            <p class="description-3">Definir e acompanhar seu objetivo torna <br> seu dia-a-dia mais organizado. Com a
                <br> nossa ferramenta de visualização seus <br> objetivos se tornam amigáveis.
            </p>
        </div>
        <div class="image-section3">
            <img src="{{ asset('/images/daily.jpg') }}" alt="teste">
        </div>
    </section>
    <!--Fim da Seção de texto 2-->

    <!--Footer-->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-col">
                    <h4>Dejavu</h4>
                    <ul>
                        <li>
                            <p>Agora você pode planejar, priorizar e acompanhar suas atividades diárias de forma fácil e
                                eficiente. Menos stress, mais produtividade! </p>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Sobre</h4>
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('contacts') }}">Contato</a></li>
                        <li><a href="{{ route('about-us') }}">Sobre</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Sobre-Nós</h4>
                    <ul>
                        <li><a
                                href="https://linktr.ee/Dejavu?fbclid=PAZXh0bgNhZW0CMTEAAabGfx4kNTHa0phtPDyny1ZAzAECH2b77p-4Su1iL6ocpHOZIFIpZxYQfFw_aem_Cg3NWZqrG1AzPhLRB3C46Q">Linktree</a>
                        </li>
                        <li style="visibility: hidden;"><a href="#">Termos&Condições</a></li>
                        <li style="visibility: hidden;"><a href="#">Suporte</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href=" https://www.instagram.com/oficialmeudejavu/ "><i class="bi bi-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/dejavu-undefined-3b9035338/"><i
                                class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->

    <script type="text/javascript">
        var counter = 1;
        setInterval(function () {
            document.getElementById('radio' + counter).checked = true;
            counter++;
            if (counter > 4) {
                counter = 1;
            }
        }, 3000);
    </script>

    <!--End Slider-->

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
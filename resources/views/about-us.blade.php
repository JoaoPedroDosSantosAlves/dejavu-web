<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/about-us.css')}}">
    <title>Dejavu</title>
</head>

<body>
    <!--NavBar-->
    <nav class="navbar navbar-expand-lg bg-transparent">
        <div class="container">
            <!--Logo-->
            <a href="{{ route('index') }}">
                <img src="{{ asset('/images/writelogo.png') }}" alt="Logo Dejavu" class="logo-img">
            </a>
            <!--Toggle Button-->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvas-navbar" aria-controls="offcanvas-navbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--SideBar-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvas-navbar"
                aria-labelledby="offcanvas-navbar-label">
                <div class="offcanvas-header">
                    <img src="{{ asset('/images/writelogo.png')}}" alt="Logo Dejavu" class="logo-img-sidebar"
                        style="margin-top: 15px;">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacts') }}">Contatos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " href="{{ route('about-us') }}">Sobre Nós</a>
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
            <h1 class="title">Descubra<br> nossa jornada </h1>
            <div class="buttons">
                <a href="#" class="button primary">Comece por aqui</a>
                <a href="#" class="button secondary">Comece por aqui</a>
            </div>
        </div>
        <div class="image-container">
            <img src="{{ asset('/images/index-woman.png') }}" alt="teste" style="width: 449px; height: 509px;">
        </div>
    </section>
    <!--End Hero Section-->


    <!-- Seção de texto 1 -->

    <!-- Fim da Seção de texto 1 -->

    <!-- Seção de texto 2 -->
    <section class="section-text section-2">
        <div class="content">
            <h1 class="section-title">Ajudando Pessoas <br> a Organizar suas Tarefas</h1>
            <p class="section-description">O Dejavu começou a partir da ideia de <br> ajudar as pessoas, famílias que
                precisam <br> de uma ajudinha para criar o <br> gerenciamento de suas tarefas.
                Registrar e<br>
                organizar as tarefas de maneira produtiva <br> e assim reduzindo o estresse.
            </p>
        </div>
        <div class="section-image">
            <img src="{{ asset('/images/gear.jpg') }}" alt="teste">
        </div>
    </section>
    <!-- Fim da Seção de texto 2 -->

    <!-- Seção de texto 3 -->
    <section class="section-text section-3">
        <div class="content">
            <h1 class="section-title">A Conexão entre <br> Organização e <br> Comportamento</h1>
            <p class="section-description">Estudos apontam que a organização <br> está muito relacionada ao nosso <br>
                comportamento. Se estamos com a <br> vida bagunçada tudo em nossa volta <br> se torna uma bagunça.
            </p>
        </div>
        <div class="section-image">
            <img src="{{ asset('/images/work-table.webp') }}" alt="teste">
        </div>
    </section>
    <!-- Fim da Seção de texto 3 -->

    <!-- Seção de texto 4 -->
    <section class="section-text section-1">
        <div class="content">
            <h1 class="section-title">A Importância de Manter <br> uma Rotina para um <br> Lar Organizado</h1>
            <p class="section-description">Nosso objetivo é mostrar para o usuário <br> que manter uma rotina para
                arrumar a <br> sua casa é de extrema importancia. <br> O seu lar é o lugar mais importante na <br> sua
                vida.
            </p>
        </div>
        <div class="section-image">
            <img src="{{ asset('/images/routine.jpg') }}" alt="teste">
        </div>
    </section>
    <!-- Fim da Seção de texto 4 -->

    <!--Team Section-->
    <section class="team">
        <div class="container-team">
            <div class="section-team-title">
                <h2>Team</h2>
                <div class="underline"></div>
                <p>Integrantes Dejavu </p>
            </div>
            <div class="row">
                <!-- Linkedin do Time-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/dejavu-logo.webp') }}" class="img-fluid" alt="team1">
                        </div>
                        <div class="member-info">
                            <h4>Dejavu</h4>
                            <span></span>
                            <p>Aplicativo de tarefas.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/dejavu-undefined-3b9035338/ "> <i
                                        class="bi bi-linkedin"></i> </a>
                                <a href=" https://www.instagram.com/oficialmeudejavu/ "> <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team member 1-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_01.jpg') }}" class="img-fluid" alt="team1">
                        </div>
                        <div class="member-info">
                            <h4>Heloísa Fleury</h4>
                            <span>Desenvolvedora Front-End</span>
                            <p>Brasileira, 20 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/helo%C3%ADsa-fleury-jardim-2780482b8/ "> <i
                                        class="bi bi-linkedin"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Team member 2-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_02.jpeg') }}" class="img-fluid" alt="team3">
                        </div>
                        <div class="member-info">
                            <h4>Jhony Weverton</h4>
                            <span>Desenvolvedor Front-End</span>
                            <p>Brasileiro, 18 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/jhony-weverton-147412286/ "> <i
                                        class="bi bi-linkedin"></i> </a>
                                <a href=" https://www.instagram.com/_jhonyw/ "> <i class="bi bi-instagram"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Team member 3-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_03.jpg') }}" class="img-fluid" alt="team2">
                        </div>
                        <div class="member-info">
                            <h4>Jiovanna Barros</h4>
                            <span>UI/UX Designer & Social Media</span>
                            <p>Brasileira, 21 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/jiovanna-barros-26945723b/ "> <i
                                        class="bi bi-linkedin"></i> </a>
                                <a href=" https://www.instagram.com/jiovannabarros/ "> <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team member 4-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_04.jpg') }}" class="img-fluid" alt="team4">
                        </div>
                        <div class="member-info">
                            <h4>Joao Alves</h4>
                            <span>Desenvolvedor Back-End</span>
                            <p>Brasileiro, 18 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/joao-pedro-dos-santos-alves-5591a2265/ "> <i
                                        class="bi bi-linkedin"></i> </a>
                                <a href=" https://www.instagram.com/joaooallvss/ "> <i class="bi bi-instagram"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team member 5-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_05.jpg') }}" class="img-fluid" alt="team5">
                        </div>
                        <div class="member-info">
                            <h4>Julia Souza</h4>
                            <span>Desenvolvedora Front-End</span>
                            <p>Brasileira, 24 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/juliasisouza/ "> <i class="bi bi-linkedin"></i>
                                </a>
                                <a href=" https://www.instagram.com/juliaslvsouza/ "> <i class="bi bi-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team member 6-->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_06.jpg') }}" class="img-fluid" alt="team6">
                        </div>
                        <div class="member-info">
                            <h4>Leonardo Lins</h4>
                            <span>Scrum Master</span>
                            <p>Brasileiro, 22 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/leonardolinsv/ "> <i class="bi bi-linkedin"></i>
                                </a>
                                <a href=" https://www.instagram.com/iam.lins/ "> <i class="bi bi-instagram"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Team member 7 -->
                <div class="col-lg-6 mt-4">
                    <div class="member d-flex allign-items-start">
                        <div class="teampic">
                            <img src="{{ asset('/images/integrante_07.jpg') }}" class="img-fluid" alt="team6">
                        </div>
                        <div class="member-info">
                            <h4>Vitor Vieira</h4>
                            <span>Redator & QA</span>
                            <p>Brasileiro, 19 anos.</p>
                            <div class="social">
                                <a href=" https://www.linkedin.com/in/vitor-vieira-nascimento-14515428a/ "> <i
                                        class="bi bi-linkedin"></i>
                                </a>
                                <a href=" https://www.instagram.com/vieira.only/ "> <i class="bi bi-instagram"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

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
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap Icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>
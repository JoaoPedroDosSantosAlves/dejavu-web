<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/library.css') }}" />
    <title>Biblioteca</title>
    <link rel="icon" href="assets/img/dejavu-logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            background-color: #ffffff;
        }

        li {
            line-height: 1.8;
        }

        .main-content {
            margin-left: 270px;
            width: calc(100% - 220px);
            padding: 20px;
            
        }

        .slideshow {
            position: relative;
            width: 80%;
            height: 250px;
            overflow: hidden;
            margin-bottom: 20px;
            margin-top: 30px;
            border-radius: 10px;
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .slide.active {
            opacity: 1;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .noticias {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 80%;
         
            
        }

        .noticia {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            
        }

        .noticia iframe {
            flex-shrink: 0;
            width: 400px;
            height: 200px;
            border-radius: 8px;
            border: none;
        }

        .noticia-content {
            flex: 1;
           
        }

        .noticia h2 {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 10px;
        }

        .noticia ul {
            list-style-type: disc;
            padding-left: 20px;
            margin-bottom: 10px;
            color: #555;
        }

        .noticia p {
            color: #777;
            font-size: 0.9em;
        }

        /* Responsividade para telas de largura máxima de 768px */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 10px;
            }

            .slideshow {
                width: 100%;
                height: 200px;
                margin-top: 70px;
            }

            .noticias {
                width: 100%;
            }

            .noticia {
                flex-direction: column;
                align-items: center;
            }

            .noticia iframe {
                width: 100%;
                height: 200px;
                margin-bottom: 10px;
            }

            .noticia h2 {
                font-size: 1em;
            }

            .noticia p {
                font-size: 0.85em;
            }
        }
    </style>
</head>

<body>

<div class="container">
        <div class="sidebar">
            <img src="{{ asset('/images/writelogo.png') }}">
            <div class="menu">
               

            <a href="{{ route('home') }}">
                    <button class="nav-button">
                        <i class="fas fa-home"></i>
                        <span>Cartões</span>
                    </button>
                </a>

                <a href="calendar.html">
                    <button class="nav-button">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Calendário</span>
                    </button>
                </a>
                <a href="{{ route('library') }}">
                    <button class="nav-button">
                        <i class="fas fa-bars"></i>
                        <span>Biblioteca</span>
                    </button>
                </a>

                 <!-- Botão para abrir o modal com ícone + -->
                 <a href="{{ route('quiz') }}">
                    <button class="nav-button">
                        <i class="fas fa-question-circle"></i>
                        <span>Quiz</span>
                    </button>
                </a>

                <a href="{{ route('index') }}" class="logout">
                    <button class="nav-button">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </a>
            </div>
        </div>

        <div class="main-content">
            <!-- Slideshow -->
            <div class="slideshow">
                <div class="slide active">
                <img src="{{ asset('/images/daily.jpg') }}">
                </div>
                <div class="slide">
                <img src="{{ asset('/images/work-table.webp') }}">
                </div>
                <div class="slide">
                <img src="{{ asset('/images/conversation.jpg') }}">
                </div>
            </div>

            <!-- Dicas com vídeos -->
            <div class="noticias">
                <div class="noticia">
                    <iframe src="https://www.youtube.com/embed/Rdc8_fpxC3U?si=GiYxGbDkMhwj4BKR" allowfullscreen></iframe>
                    <div class="noticia-content">
                        <h2>Dica 1: Priorize suas Tarefas</h2>
                        <ul>
                            <li>Classifique as tarefas em ordem de importância.</li>
                            <li>Use uma matriz de prioridade (urgente/importante) para organizar suas tarefas.</li>
                            <li>Concentre-se nas tarefas mais importantes primeiro.</li>
                        </ul>
                        <p>Publicado há 1 hora — Em Organização</p>
                    </div>
                </div>
                
                <div class="noticia">
                    <iframe src="https://www.youtube.com/embed/ME1ZT8hnUSM?si=F2xI6erXeoVaEfjS" allowfullscreen></iframe>
                    <div class="noticia-content">
                        <h2>Dica 2: Divida Tarefas Grandes em Etapas Menores</h2>
                        <ul>
                            <li>Transforme tarefas complexas em subtarefas para facilitar a execução.</li>
                            <li>Defina prazos menores para cada etapa, evitando sobrecarga.</li>
                            <li>Conclua cada etapa antes de passar para a próxima.</li>
                        </ul>
                        <p>Publicado há 2 horas — Em Produtividade</p>
                    </div>
                </div>

                <div class="noticia">
                    <iframe src="https://www.youtube.com/embed/CQkHyIuLBdA?si=8BAjfz5WubqeF2y9" allowfullscreen></iframe>
                    <div class="noticia-content">
                        <h2>Dica 3: Defina Horários para Foco e Pausas</h2>
                        <ul>
                            <li>Trabalhe em blocos de tempo, como a técnica Pomodoro (25 minutos de foco seguidos de uma pausa curta).</li>
                            <li>Faça pausas regulares para evitar o esgotamento mental.</li>
                            <li>Estabeleça horários para as tarefas e cumpra-os.</li>
                        </ul>
                        <p>Publicado há 4 horas — Em Planejamento</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Botão de menu lateral -->
    <div class="hamburger" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>

    <script src="{{ asset('js/add-card.js') }}"></script> <!-- Script home.js -->
    <script src="{{ asset('js/to-do-list.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
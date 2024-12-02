<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}" />
    <title>Quiz</title>
    <link rel="icon" href="assets/img/dejavu-logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    



        <div class="quiz-container">
            <h1>Quiz</h1>
            <div id="quiz">
                <div id="question"></div>
                <div class="options">
                    <button class="option" onclick="selectAnswer(0)"></button>
                    <button class="option" onclick="selectAnswer(1)"></button>
                    <button class="option" onclick="selectAnswer(2)"></button>
                    <button class="option" onclick="selectAnswer(3)"></button>
                </div>
            </div>
            <div id="result" class="hidden">
                <h2>Sua pontuação: <span id="score"></span></h2>
                <button onclick="restartQuiz()">Reiniciar Quiz</button>
            </div>
        </div>


        <div class="hamburger" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>

    <script src="{{ asset('js/quiz.js') }}"></script> <!-- Script home.js -->
    <script src="{{ asset('js/to-do-list.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>
</html>
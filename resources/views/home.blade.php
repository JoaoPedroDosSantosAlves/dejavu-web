<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <title>Cards</title>
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

        <div class="main">
            <h1 class="title">Cartões</h1>
            <div class="add-task-button" id="addTaskButton">+ Adicionar</div>
            <div class="cards-container" id="cardsContainer">
                <!-- Cards aqui -->
            </div>
        </div>
    </div>
    <!-- Modal para adicionar uma nova tarefa -->
    <div class="modal" id="taskModal">
        <div class="modal-content">
            <h2>Adicionar novo card</h2>
            <input type="text" id="taskName" placeholder="Nome da tarefa" required>
            <input type="file" id="taskImage" accept="image/*">
            <button id="saveTaskButton">Salvar Tarefa</button>
            <button id="closeModalButton">Fechar</button>
        </div>
    </div>

    <!-- Modal de Confirmação -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <p>Você tem certeza que deseja</p>
        <p> deletar esta tarefa?</p>
        <button id="confirmDeleteButton">Sim</button>
        <button id="cancelDeleteButton">Cancelar</button>
    </div>
</div>
    <!-- Botão de menu lateral -->
    <div class="hamburger" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/add-card.js') }}"></script> <!-- Script home.js -->
    <script src="{{ asset('js/to-do-list.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script>
        // Abertura do modal para adicionar tarefa
        document.getElementById('addTaskButton').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('taskModal').style.display = 'flex';
        });
    
        // Fechar o modal de adicionar tarefa
        document.getElementById('closeModalButton').addEventListener('click', function() {
            document.getElementById('taskModal').style.display = 'none';
        });
    </script>
</body>
</html>
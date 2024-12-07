<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="{{ asset('/images/writelogo.png') }}">
            <div class="menu">
                <a href="{{ route('home') }}">
                    <button class="nav-button">
                        <i class="fas fa-home"></i>
                        <span>Cartões</span>
                    </button>
                </a>

                <a href="{{ route('calendar') }}">
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
        <div class="hamburger" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
        <!-- Main Content -->
        <div class="main">
            <h1>Meus Cards</h1>

            <!-- Botão de adicionar -->
            <button onclick="openModal()" class="add-task-button">Adicionar Card</button>

            <!-- Listagem de Cards -->
            <div class="cards-container">
                @forelse($cards as $card)
                <div class="card">
                    <h3 onclick="openTaskModal({{ $card->id }})">{{ strtoupper($card->name) }}</h3>
                    @if ($card->image)
                    <img src="{{ asset('storage/' . $card->image) }}" alt="Imagem do Card" onclick="openTaskModal({{ $card->id }})">
                    @endif
                    <button type="button" class="edit-button" onclick="openEditModal({{ $card->id }}, '{{ route('cards.destroy', $card->id) }}')">Editar</button>
                </div>
                @empty
                <p>Não há cards cadastrados.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Modal para Adicionar Card -->
    <div id="modal" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>Adicionar Card</h2>
            <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name">Nome do Card:</label>
                <input type="text" id="name" name="name" required>

                <label for="image">Imagem (opcional):</label>
                <input type="file" id="image" name="image" accept="image/*">

                <button type="submit" class="save-button">Salvar</button>
                <button type="button" onclick="closeModal()" class="close-button">Cancelar</button>
            </form>
        </div>
    </div>

    <!-- Modal para Editar Card -->
    <div id="modal-edit" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>Editar Card</h2>
            <form id="edit-form" action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" id="edit-card-id">

                <label for="name">Nome do Card:</label>
                <input type="text" id="edit-name" name="name" required>

                <label for="image">Imagem (opcional):</label>
                <input type="file" id="edit-image" name="image" accept="image/*">

                <div class="modal-buttons">
                    <button type="submit" class="save-button">Salvar</button>
                    <button type="button" onclick="closeModalEdit()" class="close-button">Cancelar</button>
                
            </form>

            <!-- Formulário de exclusão -->
            <form id="delete-form" action="" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Excluir Card</button>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal para Gerenciar Tarefas -->
    <div id="modal-task" class="modal" style="display: none;">
        <div class="modal-content" style="display: flex; flex-direction: row;">
            <!-- Formulário para Adicionar/Editar Tarefas -->
            <div class="modal-form">
                <h2>ADICIONAR TAREFA</h2>
                <form action="" method="POST" id="task-form">
                    @csrf
                    <input type="hidden" name="card_id" id="card_id">

                    <label for="task_name">Nome da Tarefa:</label>
                    <input type="text" name="name" id="task_name" required>

                    <label for="due_date">Data de Vencimento:</label>
                    <input type="date" name="due_date" required>

                    <label for="due_time">Hora de Vencimento:</label>
                    <input type="time" name="due_time" required>

                    <button type="submit">Adicionar Tarefa</button>
                    <button type="button" onclick="closeModalTask()" class="close-button">Cancelar</button>
                </form>
            </div>

            <!-- Lista de Tarefas -->
            <div class="modal-tasks">
                <h2>LISTA DE TAREFAS</h2>
                <div id="task-container"></div>
            </div>
        </div>
    </div>
<div id="notification" class="hidden"></div>
<div id="confirmation-modal" class="hidden">
    <div class="modal-content">
        <p>Tem certeza que deseja excluir esta tarefa?</p>
        <button id="confirm-delete" class="confirm-button">Sim</button>
        <button id="cancel-delete" class="cancel-button">Não</button>
    </div>
</div>

    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openEditModal(cardId, deleteUrl) {
            document.getElementById('delete-form').action = deleteUrl;
            const modal = document.getElementById('modal-edit');
            modal.style.display = 'flex';

            // Configura o formulário dinamicamente
            const form = document.getElementById('edit-form');
            form.action = `/cards/${cardId}`;
            document.getElementById('edit-card-id').value = cardId;

            // Adicione valores ao formulário (opcional: via requisição AJAX ou dados do card no Blade)
        }

        function closeModalEdit() {
            document.getElementById('modal-edit').style.display = 'none';
        }



        function openTaskModal(cardId) {
             // Abre o modal de tarefas
             document.getElementById('modal-task').style.display = 'flex';
            // Definindo o ID do card no formulário de tarefas
            document.getElementById('card_id').value = cardId;
            document.getElementById('task-form').action = `/tasks/${cardId}/store`;
            // Chama a função para carregar as tarefas do card
            loadTasks(cardId);
        }

        function closeModalTask() {
            document.getElementById('modal-task').style.display = 'none';
        }
        // Função para alternar a visibilidade da sidebar
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active'); // Alterna a classe 'active'
        }

        // Adiciona evento de clique para cada botão na sidebar
        document.querySelectorAll('.sidebar button').forEach(button => {
            button.addEventListener('click', () => {
                // Remove a classe 'active' de todos os botões
                document.querySelectorAll('.sidebar button').forEach(btn => {
                    btn.classList.remove('active'); // Remove a classe active
                });

                // Adiciona a classe 'active' ao botão clicado
                button.classList.add('active'); // Adiciona a classe active
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/tasks.js') }}"></script>
</body>

</html>
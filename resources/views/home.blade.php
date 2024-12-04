<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Gerenciar Cards</title>
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

        <!-- Main Content -->
        <div class="main">
            <h1>Gerenciar Cards</h1>

            <!-- Botão de adicionar -->
            <button onclick="openModal()" class="add-task-button">Adicionar Card</button>

            <!-- Listagem de Cards -->
            <div class="cards-container">
                @forelse($cards as $card)
                <div class="card" onclick="openTaskModal({{ $card->id }})">
                    <h3>{{ strtoupper($card->name) }}</h3>
                    @if ($card->image)
                    <img src="{{ asset('storage/' . $card->image) }}" alt="Imagem do Card">
                    @endif
                    <form action="{{ route('cards.destroy', $card) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" id="delete-card-{{ $card->id }}">Excluir</button>
                    </form>
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

    <!-- Modal para Gerenciar Tarefas -->
    <div id="modal-task" class="modal" style="display: none;">
        <div class="modal-content">
            <h2>Adicionar Tarefa</h2>
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

            <!-- Aqui é onde as tarefas serão listadas -->
            <div id="task-container"></div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }

        function openTaskModal(cardId) {
            document.getElementById('card_id').value = cardId;
            document.getElementById('task-form').action = `/tasks/${cardId}/store`;

            // Faz a requisição para carregar as tarefas
            const url = `/tasks/${cardId}`;
            fetch(url)
                .then(response => {
                    if (!response.ok) throw new Error('Erro ao carregar tarefas');
                    return response.json();
                })
                .then(tasks => {
                    const container = document.getElementById('task-container');
                    container.innerHTML = tasks.length ? 
                        tasks.map(task => `<div>${task.name} - ${task.due_date} ${task.due_time}</div>`).join('') 
                        : `<p>Sem tarefas!</p>`;
                })
                .catch(() => alert('Erro ao carregar tarefas!'));

            document.getElementById('modal-task').style.display = 'block';
        }

        function closeModalTask() {
            document.getElementById('modal-task').style.display = 'none';
        }
    </script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>

</html>

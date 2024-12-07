<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Calendário de Tarefas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container">
    <div class="hamburger" Onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
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
        <!-- Main Content -->
        <div class="main">
            <h1>Calendário de Tarefas</h1>

            <div class="calendar-container">
                <div class="calendar-header">
                    <button onclick="navigateMonth(-1)" class="btn">Anterior</button>
                    <h2>{{ Carbon\Carbon::createFromFormat('Y-m', "{$year}-{$month}")->format('F Y') }}</h2>
                    <button onclick="navigateMonth(1)" class="btn">Próximo</button>
                </div>

                <div id="calendar">
                    <div class="week-header">
                        <div class="calendar-day">Dom</div>
                        <div class="calendar-day">Seg</div>
                        <div class="calendar-day">Ter</div>
                        <div class="calendar-day">Qua</div>
                        <div class="calendar-day">Qui</div>
                        <div class="calendar-day">Sex</div>
                        <div class="calendar-day">Sáb</div>
                    </div>

                    <div class="calendar-grid">
                        @php
                        $firstDayOfMonth = Carbon\Carbon::createFromFormat('Y-m', "{$year}-{$month}")->startOfMonth();
                        $daysInMonth = Carbon\Carbon::createFromFormat('Y-m', "{$year}-{$month}")->daysInMonth;
                        $emptyDays = $firstDayOfMonth->dayOfWeek;
                        @endphp

                        <!-- Dias vazios -->
                        @for ($i = 0; $i < $emptyDays; $i++)
                            <div class="calendar-day empty">
                    </div>
                    @endfor

                    <!-- Dias do mês -->
                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                        $date=Carbon\Carbon::create($year, $month, $day);
                        $formattedDate=$date->format('Y-m-d');
                        $hasTasks = $tasks->contains(function ($task) use ($formattedDate) {
                        return $task->due_date === $formattedDate;
                        });
                        @endphp
                        <div
                            class="calendar-day @if ($hasTasks) has-tasks @endif"
                            onclick="fetchTasksForDate('{{ $formattedDate }}')">
                            <span>{{ $day }}</span>
                        </div>
                        @endfor
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div id="task-modal">
        <div id="task-modal-content">
            <h2>Tarefas do Dia</h2>
            <ul id="task-list-details"></ul>
            <button class="close-modal" onclick="closeModal()">Fechar</button>
        </div>
    </div>

    <script>
        function navigateMonth(direction) {
            let currentMonth = {
                {
                    $month
                }
            }; // Use 'let' aqui, pois você vai modificar o valor de currentMonth
            let currentYear = {
                {
                    $year
                }
            }; // Use 'let' aqui também, para poder modificar currentYear

            let newMonth = currentMonth + direction;

            if (newMonth > 12) {
                newMonth = 1;
                currentYear++;
            } else if (newMonth < 1) {
                newMonth = 12;
                currentYear--;
            }

            // Redireciona para o novo mês e ano
            window.location.href = `/calendar?month=${newMonth}&year=${currentYear}`;
        }

        function fetchTasksForDate(date) {
            fetch(`/calendar/tasks/${date}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(tasks => showTasksModal(date, tasks))
                .catch(error => console.error('Erro ao buscar tarefas:', error));
        }

        function showTasksModal(date, tasks) {
            const modal = document.getElementById('task-modal');
            const taskList = document.getElementById('task-list-details');
            taskList.innerHTML = ''; // Limpa a lista de tarefas

            if (tasks.length > 0) {
                tasks.forEach(task => {
                    const taskItem = document.createElement('li');
                    taskItem.textContent = `${task.name} - ${task.due_time}`;
                    taskList.appendChild(taskItem);
                });
            } else {
                const noTaskItem = document.createElement('li');
                noTaskItem.textContent = 'Nenhuma tarefa para este dia.';
                taskList.appendChild(noTaskItem);
            }

            modal.style.display = 'block';
        }

        function closeModal() {
            const modal = document.getElementById('task-modal');
            modal.style.display = 'none';
        }
    </script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadTasks(cardId) {
    $.ajax({
        url: '/tasks/list/' + cardId,
        type: 'GET',
        success: function (response) {
            $('#task-container').empty();

            if (response.length > 0) {
                response.forEach(function (task) {
                    var taskItem = `
    <div class="task-item">
        <div class="task-grid">
            <div class="task-box">
                <strong>Nome:</strong>
                <p>${task.name}</p>
            </div>
            <div class="task-box">
                <strong>Data de Vencimento:</strong>
                <p>${task.due_date}</p>
            </div>
            <div class="task-box">
                <strong>Hora de Vencimento:</strong>
                <p>${task.due_time}</p>
            </div>
            <div class="task-box">
                <strong>Status:</strong>
                <p>${task.status}</p>
            </div>
        </div>
        <div class="task-buttons">
            <button class="btn btn-primary btn-sm" onclick="editTask(${task.id})">Editar</button>
            <button class="btn btn-danger btn-sm" onclick="deleteTask(${task.id})">Excluir</button>
            <button class="btn btn-success btn-sm" onclick="completeTask(${task.id})">
                ${task.status === 'concluída' ? 'Reabrir' : 'Concluir'}
            </button>
        </div>
    </div>
`;
                    $('#task-container').append(taskItem);
                });
            } else {
                $('#task-container').append('<p>Não há tarefas para este card.</p>');
            }
        },
        error: function (error) {
            console.error("Erro ao carregar tarefas:", error);
        }
    });
}

function completeTask(taskId) {
    $.ajax({
        url: `/tasks/${taskId}/complete`,
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            showNotification(response.message, 'success');
            loadTasks($('#card_id').val()); // Recarrega a lista de tarefas
        },
        error: function (error) {
            console.error("Erro ao concluir tarefa:", error);
            showNotification("Erro ao concluir a tarefa.", 'error');
        }
    });
}

function openTaskModal(cardId) {
    document.getElementById('card_id').value = cardId;
    document.getElementById('task-form').action = `/tasks/${cardId}/store`;

    loadTasks(cardId);

    document.getElementById('modal-task').style.display = 'flex';
}

function editTask(taskId) {
    $.ajax({
        url: `/tasks/${taskId}`,
        type: 'GET',
        success: function (response) {
            // Preenche os campos do formulário
            $('#task_name').val(response.name);
            $('#due_date').val(response.due_date);
            $('#due_time').val(response.due_time);

            // Atualiza a URL de envio do formulário
            $('#task-form').attr('action', `/tasks/${taskId}/update`);

            // Exibe o modal ou formulário de edição (se aplicável)
            $('#task-modal').show();
        },
        error: function (error) {
            console.error("Erro ao carregar tarefa:", error);
        }
    });
}
function saveTask(taskId) {
    const url = `/tasks/${taskId}/update`;
    const formData = {
        name: $('#task_name').val(),
        due_date: $('#due_date').val(),
        due_time: $('#due_time').val(),
        status: $('#task_status').val(),
        _method: 'PUT', // Informar ao Laravel que estamos usando PUT
        _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token obrigatório
    };

    $.ajax({
        url: url,
        type: 'POST', // O método POST será interpretado como PUT pelo Laravel
        data: formData,
        success: function (response) {
            alert('Tarefa atualizada com sucesso!');
            $('#modal-task').hide();
            loadTasks($('#card_id').val()); // Recarrega as tarefas
        },
        error: function (error) {
            console.error("Erro ao atualizar tarefa:", error);
        }
    });
}
function showNotification(message, type = 'success') {
    const notification = document.getElementById('notification');

    // Define a cor com base no tipo de notificação
    if (type === 'success') {
        notification.style.backgroundColor = '#28a745'; // Verde para sucesso
    } else if (type === 'error') {
        notification.style.backgroundColor = '#dc3545'; // Vermelho para erro
    }

    // Define o texto e exibe a notificação
    notification.textContent = message;
    notification.classList.remove('hidden');
    notification.classList.add('show');

    // Esconde a notificação após 3 segundos
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.classList.add('hidden');
        }, 300); // Aguarde a transição de opacidade
    }, 3000);
}
function deleteTask(taskId) {
    const modal = document.getElementById('confirmation-modal');
    const confirmButton = document.getElementById('confirm-delete');
    const cancelButton = document.getElementById('cancel-delete');

    // Exibe o modal
    modal.classList.add('show');

    // Define o comportamento dos botões
    confirmButton.onclick = function () {
        $.ajax({
            url: `/tasks/${taskId}/destroy`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                showNotification(response.message, 'success');
                loadTasks($('#card_id').val());
            },
            error: function (error) {
                console.error("Erro ao excluir tarefa:", error);
                showNotification("Erro ao excluir a tarefa.", 'error');
            }
        });

        // Fecha o modal após a exclusão
        modal.classList.remove('show');
    };

    cancelButton.onclick = function () {
        // Fecha o modal sem excluir
        modal.classList.remove('show');
    };
}

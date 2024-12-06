<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\Task;
use App\Models\User;

class TaskPolicy
{
    /**
     * Determina se o usuário pode criar uma tarefa para o card.
     */
    public function create(User $user, Card $card)
    {
        return $user->id === $card->user_id;
    }
    public function delete(User $user, Task $task)
{
    return $user->id === $task->user_id; // O usuário só pode excluir suas próprias tarefas
}
public function update(User $user, Task $task)
    {
        // Permitir apenas se a tarefa pertence ao usuário autenticado
        return $user->id === $task->user_id;
    }
}

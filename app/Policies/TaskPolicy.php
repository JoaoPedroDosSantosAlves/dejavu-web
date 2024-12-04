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
}

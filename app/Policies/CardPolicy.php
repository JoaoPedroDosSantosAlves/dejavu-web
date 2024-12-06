<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;
use App\Models\Task;


class CardPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Card $card)
{
    return $user->id === $card->user_id;
}
public function update(User $user, Card $card)
    {
        // Apenas o proprietário do card pode atualizá-lo, ou se o usuário for administrador
        return $user->id === $card->user_id || $user->is_admin;
    }
}

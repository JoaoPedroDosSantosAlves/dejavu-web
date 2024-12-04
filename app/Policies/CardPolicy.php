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
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'due_date',
        'due_time',
        'status',
        'card_id',
    ];

    // Definindo as constantes para o status
    const STATUS_PENDING = 'não concluído';
    const STATUS_COMPLETED = 'concluído';

    /**
     * Relacionamento: Uma tarefa pertence a um card.
     */
    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}

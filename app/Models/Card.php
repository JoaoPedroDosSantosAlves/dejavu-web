<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'user_id',
    ];

    /**
     * Relacionamento: Um card pertence a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento: Um card possui muitas tarefas.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}

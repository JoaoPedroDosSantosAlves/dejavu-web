<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'user_id',
        'rooms_name',
    ];

    public function tasks(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

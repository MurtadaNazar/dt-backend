<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'text',
        'avatar_url',
        'date',
        'starts',
    ];

    protected $casts = [
        'date' => 'datetime',
        'starts' => 'integer',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestTraderProfile extends Model
{
    protected $fillable = [
        'imgurl',
        'name',
        'balance',
    ];
    use HasFactory;
}

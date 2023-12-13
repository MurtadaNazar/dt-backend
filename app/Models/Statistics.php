<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    protected $fillable = [
        'monthlyWithDrawal',
        'monthlyIbWithDrawal',
        'monthlyTradingRange',
        'monthlyActiveClient',
    ];

    protected $casts = [
        'monthlyWithDrawal' => 'integer',
        'monthlyIbWithDrawal' => 'integer',
        'monthlyTradingRange' => 'integer',
        'monthlyActiveClient' => 'integer',
    ];
    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class casino extends Model
{
    protected $table = 'casino_wins';

    protected $fillable = [
        'casinoGame',
        'AmountPlayed',
        'AmountWon',
    ];
}

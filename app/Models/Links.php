<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'check_links_clicked';

    protected $fillable = [
        'name',
        'location',
        'amount',
    ];
}

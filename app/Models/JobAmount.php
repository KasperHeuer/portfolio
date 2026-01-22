<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAmount extends Model
{
    protected $table = 'jobs_amount';

    protected $fillable = [
        'name',
        'amount',
    ];
}

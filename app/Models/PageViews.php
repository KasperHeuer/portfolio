<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageViews extends Model
{
    protected $table = 'page_amount';

    protected $fillable = [
        'name',
        'amount',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tolkienFamily extends Model
{
    protected $table = 'tolkien_wiki_familiy';

    protected $fillable = [
        'class_id',
        'name',
        'description'
    ];
}

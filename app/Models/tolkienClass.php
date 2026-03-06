<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tolkienClass extends Model
{
    protected $table = 'tolkien_wiki_class';

    protected $fillable = [
        'name',
        'description',
    ];
}

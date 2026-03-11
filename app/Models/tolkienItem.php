<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tolkienItem extends Model
{
    protected $table = 'tolkien_wiki_item';

    protected $fillable = [
        'familiy_id',
        'name',
        'description',
    ];
}

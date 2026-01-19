<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacted_by';

    protected $fillable = ['name', 'email', 'note'];
}

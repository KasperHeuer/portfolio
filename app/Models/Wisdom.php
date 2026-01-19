<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisdom extends Model
{
    protected $table = 'wisdom_of_the_crowd';

    protected $fillable = ['guess'];
}

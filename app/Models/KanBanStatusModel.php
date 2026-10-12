<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanBanStatusModel extends Model
{
    protected $fillable = [
        'title',
        'colour',
        'priority',
    ];
    protected $table = "kanban_status";
}

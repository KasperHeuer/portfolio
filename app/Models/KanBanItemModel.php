<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanBanItemModel extends Model
{
    protected $fillable = ["title", "description", "priority", "kan_ban_status_model_id"];
    protected $table = "kanban_items";
}

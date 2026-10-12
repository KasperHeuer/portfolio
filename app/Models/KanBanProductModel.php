<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanBanProductModel extends Model
{
    protected $table = "kanban_item_product";
    protected $fillable = [
        "name",
        "description",
        "cost",
        "amount",
        "kan_ban_item_model_id"
    ];
}

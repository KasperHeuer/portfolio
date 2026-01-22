<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class DashboardUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'dashboards';
}

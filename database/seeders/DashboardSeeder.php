<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dashboards')->insert([
            'username' => 'Kasper',
            'password' => Hash::make('Wagtwoort123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

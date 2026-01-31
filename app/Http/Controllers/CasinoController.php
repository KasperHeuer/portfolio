<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageViews;
use Illuminate\Http\Request;

class CasinoController extends Controller
{
    public function index()
    {
        PageViews::firstOrCreate(
            ['name' => '/casino/home'],
            ['amount' => 0],
        )->increment('amount');
        return view('blackjack.index');
    }
}

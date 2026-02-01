<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageViews;
use Illuminate\Http\Request;

class MathHomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function view()
    {
        PageViews::firstOrCreate(
            ['name' => 'math/home'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.home');
    }
}

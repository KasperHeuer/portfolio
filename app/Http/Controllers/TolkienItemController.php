<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TolkienItemController extends Controller
{
    public function create()
    {
        return view('tolkien.create');
    }
}

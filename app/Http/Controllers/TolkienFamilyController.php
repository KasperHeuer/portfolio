<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TolkienFamilyController extends Controller
{
    public function create()
    {
        return view('tolkien.family.create');
    }
}

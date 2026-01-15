<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $schoolEinde = mktime(0, 0, 0, 6, 28, 2027);
        $huidig = time();
        $einde = $schoolEinde <= $huidig ? '2027' : 'heden';

        return view('index', compact('einde'));
    }
}

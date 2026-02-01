<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageViews;

class IndexController extends Controller
{
    public function view(Request $request)
    {
        $schoolEinde = mktime(0, 0, 0, 6, 28, 2027);
        $huidig = time();
        $einde = $schoolEinde <= $huidig ? '2027' : 'heden';

        PageViews::firstOrCreate(
            ['name' => '/'],
            ['amount' => 0],
        )->increment('amount');
        return view('index', compact('einde'));
    }
}

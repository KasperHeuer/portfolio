<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageViews;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function view(Request $request)
    {
        $huidig = time();
        $jaar = date("d/m/Y", $huidig);

        $geboorte = mktime(0, 0, 0, 4, 3, 2007);
        $verschil = $huidig - $geboorte;
        $jaren = (int) floor($verschil / 31557600); //60 * 60 * 24 * 365.25


        $schoolEinde = mktime(0, 0, 0, 6, 28, 2027);
        $einde = $schoolEinde <= $huidig ? '2027' : 'heden';

        $aboutInfo = [$jaren, $einde];

        PageViews::firstOrCreate(
            ['name' => '/about'],
            ['amount' => 0],
        )->increment('amount');

        return view('about', compact('aboutInfo'));
    }
}

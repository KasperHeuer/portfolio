<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wisdom;
use Illuminate\Http\Request;

class WisdomController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
            ]);

            Wisdom::create([
                'guess' =>  $data['number'],
            ]);


            $result = [
                'guess' => $data['number'],
                'avg' => Wisdom::avg('guess'),
                'total_participants' => Wisdom::count('guess'),
            ];

            return view('math.wisdom', compact("result"));
        }
        return view('math.wisdom');
    }
}

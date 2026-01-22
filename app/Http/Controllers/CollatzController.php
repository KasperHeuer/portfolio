<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateCollatzJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class CollatzController extends Controller
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
            
            $result = CalculateCollatzJob::dispatchSync($data);
            
            return view('math.collatz', compact('result'));
        }
        PageViews::firstOrCreate(
            ['name' => '/math/collatz-sequence'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.collatz');
    }
}

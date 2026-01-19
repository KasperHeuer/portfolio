<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateCollatzJob;
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
        return view('math.collatz');
    }
}

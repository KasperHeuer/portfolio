<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateFibonacciJob;
use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod("post"))
        {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
            ]);

            $result = CalculateFibonacciJob::dispatchSync($data);

            return view('math.fibonacci', compact("result"));
        }
        return view('math.fibonacci');
    }
}

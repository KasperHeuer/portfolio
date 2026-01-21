<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateExponentJob;
use Illuminate\Http\Request;

class ExponentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
                'exponent' => 'required|integer|min:2',
            ]);
            
            $result = CalculateExponentJob::dispatchSync($data);
            return view('math.exponents', compact('result'));
        }

        return view('math.exponents');
    }
}

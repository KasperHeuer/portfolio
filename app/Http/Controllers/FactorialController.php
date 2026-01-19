<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateFactorialJob;
use Illuminate\Http\Request;

class FactorialController extends Controller
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

            $result = CalculateFactorialJob::dispatchSync($data);

            return view('math.factorial', compact('result'));
        }
        return view('math.factorial');
    }
}

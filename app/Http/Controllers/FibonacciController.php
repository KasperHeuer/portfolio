<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateFibonacciJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class FibonacciController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function view()
    {

        PageViews::firstOrCreate(
            ['name' => '/math/fibonacci-sequence'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.fibonacci');
    }

    public function create(Request $request)
    {
        if ($request->isMethod("post")) {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
            ]);

            $result = CalculateFibonacciJob::dispatchSync($data);

            return view('math.fibonacci', compact("result"));
        }
    }
}

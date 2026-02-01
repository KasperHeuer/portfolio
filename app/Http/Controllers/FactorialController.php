<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateFactorialJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class FactorialController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function view()
    {
        PageViews::firstOrCreate(
            ['name' => '/math/factorial'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.factorial');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'number' => 'required|integer|min:0',
            ]);

            $result = CalculateFactorialJob::dispatchSync($data);

            return view('math.factorial', compact('result'));
        }
    }
}

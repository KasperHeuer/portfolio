<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateExponentJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class ExponentsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function view(Request $request)
    {


        PageViews::firstOrCreate(
            ['name' => '/math/exponents'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.exponents');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
                'exponent' => 'required|integer|min:2',
            ]);

            $result = CalculateExponentJob::dispatchSync($data);
            return view('math.exponents', compact('result'));
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CheckPerfectNumberJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class PerfectNumberController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data = $request->validate([
                'number' => 'required|integer|min:1',
            ]);
            $result = CheckPerfectNumberJob::dispatchSync($data);
            return view('math.perfect', compact('result'));
        }

        PageViews::firstOrCreate(
            ['name' => '/math/perfect-numbers'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.perfect');
    }
}

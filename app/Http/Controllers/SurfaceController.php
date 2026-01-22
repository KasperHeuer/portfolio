<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateSurfaceJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class SurfaceController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('POST')) {
            switch ($request->shape) {
                case 'rectangle':
                    $data = $request->validate([
                        'length' => 'required|numeric|min:0.01',
                        'width'  => 'required|numeric|min:0.01',
                        'shape' => 'required|string',
                    ]);
                    break;
        
                case 'square':
                    $data = $request->validate([
                        'length' => 'required|numeric|min:0.01',
                        'width'  => 'required|numeric|min:0.01',
                        'shape' => 'required|string',
                    ]);
                    break;
        
                case 'circle':
                    $data = $request->validate([
                        'diameter' => 'required|numeric|min:0.01',
                        'shape' => 'required|string',
                    ]);
                    break;
        
                case 'triangle':
                    $data = $request->validate([
                        'base'   => 'required|numeric|min:0.01',
                        'height' => 'required|numeric|min:0.01',
                        'shape' => 'required|string',
                    ]);
                    break;
        
                default:
                    return back()->withErrors(['shape' => 'Invalid shape selected']);
            }
            
            $result = CalculateSurfaceJob::dispatchSync($data);
            return view ('math.surface', compact('result'));
        }

        PageViews::firstOrCreate(
            ['name' => '/math/surface-area'],
            ['amount' => 0],
        )->increment('amount');
        return view('math.surface');
    }
}

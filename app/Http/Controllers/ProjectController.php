<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $github = ['Laravel', 'PHP', 'JavaScript', 'HTML', 'CSS'];
        $math   = ['Laravel', 'PHP', 'HTML', 'CSS'];

        $codetalen = [
            'github' => collect($github)->shuffle()->take(5)->values(),
            'math'   => collect($math)->shuffle()->take(4)->values(),
        ];

        return view('projects', compact('codetalen'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PageViews;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function view(Request $request)
    {
        $github = collect(['Laravel', 'PHP', 'JavaScript', 'HTML', 'CSS'])
            ->shuffle()
            ->take(5)
            ->values();

        $math = collect(['Laravel', 'PHP', 'HTML', 'CSS'])
            ->shuffle()
            ->take(4)
            ->values();

        $casino = collect(['Laravel', 'PHP', 'HTML', 'CSS'])
            ->shuffle()
            ->take(4)
            ->values();


        PageViews::firstOrCreate(
            ['name' => '/projects'],
            ['amount' => 0],
        )->increment('amount');

        return view('projects', compact('github', 'math', 'casino'));
    }
}

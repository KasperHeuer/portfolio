<?php

namespace App\Http\Controllers;

use App\Jobs\EmailContactJob;
use App\Jobs\SaveContactJob;
use App\Models\PageViews;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'naam'  => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'note'  => 'required|string',
            ]);
            // Dispatch jobs after the response is sent
            SaveContactJob::dispatchSync($data);
            EmailContactJob::dispatchSync($data);
    
            return redirect()->back()->with('success', 'Contact saved successfully!');
        }

        PageViews::firstOrCreate(
            ['name' => '/contact'],
            ['amount' => 0],
        )->increment('amount');
    
        return view('contact');
    }
}

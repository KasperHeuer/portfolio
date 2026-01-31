<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\casino;
use App\Models\Contact;
use App\Models\JobAmount;
use App\Models\PageViews;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'username' => 'required|string|min:3|max:50|alpha_num',
                'password' => 'required|string|min:6|max:255',
            ]);

            if ($data['username'] === config('dashboard.username') && $data["password"] === config('dashboard.password')) {
                $request->session()->put('dashboard_user', $data['username']);

                return redirect()->route('dashboard.home');
            }

            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }
        $username = $request->session()->get('dashboard_user');

        if ($username && $username === 'Kasper') {
            return view('dashboard.dashboard', compact('username'));
        }

        PageViews::firstOrCreate(
            ['name' => '/dashboard'],
            ['amount' => 0],
        )->increment('amount');

        return view('dashboard.login');
    }

    public function home(Request $request)
    {
        $username = $request->session()->get('dashboard_user');

        if (!$username) {
            return redirect()->route('dashboard.Login');
        }

        if ($username !== 'Kasper') {
            return redirect()->route('dashboard.Login')->withErrors(['login' => 'Unauthorized user']);
        }

        PageViews::firstOrCreate(
            ['name' => '/dashboard'],
            ['amount' => 0],
        )->increment('amount');

        return view('dashboard.dashboard', compact('username'));
    }

    public function getContact()
    {
        return Contact::orderBy('created_at')->cursorPaginate(15);
    }


    public function getJobAmount()
    {
        return JobAmount::orderBy('amount', 'DESC')->get();
    }

    public function getPageAmount()
    {
        return PageViews::orderBy('amount', 'DESC')->get();
    }

    public function getCasinoInfo()
    {
        return casino::get();
    }
}

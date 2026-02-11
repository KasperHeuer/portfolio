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
    private function getContact()
    {
        return Contact::orderBy('created_at', 'desc')->cursorPaginate(15);
    }

    private function getJobAmount()
    {
        return JobAmount::orderBy('amount', 'desc')->get();
    }

    private function getPageAmount()
    {
        return PageViews::orderBy('amount', 'desc')->get();
    }

    private function getCasinoInfo()
    {
        return casino::orderBy('updated_at', 'desc')->get();
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|min:6|max:255',
            ]);

            if ($credentials['username'] === config('dashboard.username') &&
                $credentials['password'] === config('dashboard.password')) {

                $request->session()->put('dashboard_user', $credentials['username']);

                $data = [
                    'contactAttempts' => $this->getContact(),
                    'jobs' => $this->getJobAmount(),
                    'pages' => $this->getPageAmount(),
                    'casinoGames' => $this->getCasinoInfo(),
                ];

                return view('dashboard.dashboard', [
                    'username' => $credentials['username'],
                    'data' => $data
                ]);
            }

            return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
        }

        $username = $request->session()->get('dashboard_user');

        if ($username && $username === config('dashboard.username')) {
            $data = [
                'contactAttempts' => $this->getContact(),
                'jobs' => $this->getJobAmount(),
                'pages' => $this->getPageAmount(),
                'casinoGames' => $this->getCasinoInfo(),
            ];

            return view('dashboard.dashboard', compact('username', 'data'));
        }

        PageViews::firstOrCreate(['name' => '/dashboard'], ['amount' => 0])->increment('amount');

        return view('dashboard.login');
    }

    public function home(Request $request)
    {
        $username = $request->session()->get('dashboard_user');

        if (!$username) {
            return redirect()->route('dashboard.login');
        }

        if ($username !== config('dashboard.username')) {
            return redirect()->route('dashboard.login')->withErrors(['login' => 'Unauthorized user']);
        }

        PageViews::firstOrCreate(['name' => '/dashboard'], ['amount' => 0])->increment('amount');

        $data = [
            'contactAttempts' => $this->getContact(),
            'jobs' => $this->getJobAmount(),
            'pages' => $this->getPageAmount(),
            'casinoGames' => $this->getCasinoInfo(),
        ];

        return view('dashboard.dashboard', compact('username', 'data'));
    }
}

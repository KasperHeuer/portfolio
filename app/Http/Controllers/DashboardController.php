<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\CalculateCollatzJob;
use App\Jobs\CalculateExponentJob;
use App\Jobs\CalculateFactorialJob;
use App\Jobs\CalculateFibonacciJob;
use App\Jobs\CheckPerfectNumberJob;
use App\Models\Casino;
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
        return Casino::orderBy('updated_at', 'desc')->get();
    }

    /**
     * Run basic job tests and return results as an array.
     */
    private function testJobs(): array
    {
        // Collatz test
        $collatzData = ['number' => 4];
        $collatzResult = (new CalculateCollatzJob($collatzData, false))->handle();
        $collatzSuccessful = $collatzResult['sequence'] === [4, 2, 1]
            && $collatzResult['steps'] === 2
            && $collatzResult['maxValue'] === 4;

        // Exponent test
        $exponentData = ['number' => 2, 'exponent' => 3];
        $exponentResult = (new CalculateExponentJob($exponentData, false))->handle();
        $exponentSuccessful = $exponentResult['result'] === 8;

        // Factorial test
        $factorialData = ['number' => 5];
        $factorialResult = (new CalculateFactorialJob($factorialData, false))->handle();
        $factorialSuccessful = $factorialResult['sequence'] === [5, 4, 3, 2, 1]
            && $factorialResult['result'] === 120;

        // Fibonacci test
        $fibonacciData = ['number' => 10];
        $fibonacciResult = (new CalculateFibonacciJob($fibonacciData, false))->handle();
        $fibonacciSuccessful = $fibonacciResult['sequence'] === [0, 1, 1, 2, 3, 5, 8, 13, 21, 34];

        // Perfect number test
        $perfectNumberData = ['number' => 6];
        $perfectNumberResult = (new CheckPerfectNumberJob($perfectNumberData, false))->handle();
        $perfectNumberSuccessful = $perfectNumberResult['number'] === 6
            && $perfectNumberResult['result'] === true
            && $perfectNumberResult['devisors'] === [1, 2, 3];

        return [
            'collatzSuccessful' => $collatzSuccessful,
            'exponentSuccessful' => $exponentSuccessful,
            'factorialSuccessful' => $factorialSuccessful,
            'fibonacciSuccessful' => $fibonacciSuccessful,
            'perfectNumberSuccessful' => $perfectNumberSuccessful,
        ];
    }

    public function __invoke(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'username' => 'required|string|min:3|max:50',
                'password' => 'required|string|min:6|max:255',
            ]);

            if (
                $credentials['username'] === config('dashboard.username') &&
                $credentials['password'] === config('dashboard.password')
            ) {
                $request->session()->put('dashboard_user', $credentials['username']);

                $data = [
                    'contactAttempts' => $this->getContact(),
                    'jobs' => $this->getJobAmount(),
                    'pages' => $this->getPageAmount(),
                    'casinoGames' => $this->getCasinoInfo(),
                    'jobTests' => $this->testJobs(),
                ];

                return view('dashboard.dashboard', [
                    'username' => $credentials['username'],
                    'data' => $data,
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
                'jobTests' => $this->testJobs(),
            ];

            return view('dashboard.dashboard', compact('username', 'data'));
        }

        PageViews::firstOrCreate(['name' => '/dashboard'], ['amount' => 0])->increment('amount');

        return view('dashboard.login');
    }

    public function home(Request $request)
    {
        $username = $request->session()->get('dashboard_user');

        if (!$username || $username !== config('dashboard.username')) {
            return redirect()->route('dashboard.login')
                ->withErrors(['login' => 'Unauthorized user']);
        }

        PageViews::firstOrCreate(['name' => '/dashboard'], ['amount' => 0])->increment('amount');

        $data = [
            'contactAttempts' => $this->getContact(),
            'jobs' => $this->getJobAmount(),
            'pages' => $this->getPageAmount(),
            'casinoGames' => $this->getCasinoInfo(),
            'jobTests' => $this->testJobs(),
        ];

        return view('dashboard.dashboard', compact('username', 'data'));
    }
}

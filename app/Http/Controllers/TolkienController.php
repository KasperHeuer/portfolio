<?php

namespace App\Http\Controllers;

use App\Models\tolkienClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TolkienController extends Controller
{

    public function index()
    {
        $items = tolkienClass::all();
        return view('tolkien.home', compact('items'));

        return redirect()->route('tolkien.register');
    }

    public function register()
    {
        return view('tolkien.register');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users,name',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Auth::login($user);

        return redirect()->route('tolkien.home');
    }

    public function login()
    {
        return view('tolkien.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['name' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            return redirect()->route('tolkien.home');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function select()
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        return view('tolkien.select');
    }
}

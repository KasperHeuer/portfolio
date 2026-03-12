<?php

namespace App\Http\Controllers;

use App\Models\TolkienClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TolkienClassController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        return view('tolkien.class.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        TolkienClass::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Class created successfully!');
    }

    public function delete($class_id)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }

        $class = TolkienClass::findOrFail($class_id);
        $class->delete();

        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Class deleted successfully!');
    }
}

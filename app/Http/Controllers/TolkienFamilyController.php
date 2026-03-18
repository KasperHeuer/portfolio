<?php

namespace App\Http\Controllers;

use App\Models\tolkienClass;
use App\Models\tolkienFamily;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TolkienFamilyController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        $classes = tolkienClass::get();
        return view('tolkien.family.create', compact("classes"));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }


        $data = $request->validate([
            'class_id' => 'required|exists:tolkien_wiki_class,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        tolkienFamily::create([
            'class_id' => $data["class_id"],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Family created successfully!');
    }


    public function view(int $class_id)
    {

        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        $data = tolkienFamily::where('class_id', $class_id)->get();
        $class_name = tolkienClass::where('id', $class_id)->value('name');
        return view('tolkien.family.view', compact('data', 'class_name'));
    }

    public function delete(int $family_id)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        tolkienFamily::where('id', $family_id)->delete();
        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Family deleted successfully!');
    }
}

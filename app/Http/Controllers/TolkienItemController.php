<?php

namespace App\Http\Controllers;

use App\Models\PageViews;
use App\Models\tolkienFamily;
use App\Models\tolkienItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TolkienItemController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }
        $families = tolkienFamily::get();
        PageViews::firstOrCreate(
            ['name' => '/tolkien/item/create'],
            ['amount' => 0],
        )->increment('amount');
        return view('tolkien.item.create', compact('families'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }

        $data = $request->validate([
            'familiy_id' => 'required|exists:tolkien_wiki_familiy,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        tolkienItem::create([
            'familiy_id' => $data['familiy_id'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Item created successfully!');
    }

    public function view(int $family_id)
    {
        $data = tolkienItem::where('familiy_id', $family_id)->get();
        $family_name = tolkienFamily::where('id', $family_id)->value('name');

        PageViews::firstOrCreate(
            ['name' => "/tolkien/item/view/$family_id"],
            ['amount' => 0],
        )->increment('amount');

        return view('tolkien.item.view', compact('data', 'family_name'));
    }

    public function delete(int $item_id)
    {
        if (!Auth::check()) {
            return redirect()->route('tolkien.register');
        }

        $item = tolkienItem::findOrFail($item_id);
        $item->delete();

        return redirect()
            ->route('tolkien.home')
            ->with('success', 'Item deleted successfully!');
    }
}

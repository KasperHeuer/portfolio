<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KanBanItemModel;
use App\Models\KanBanProductModel;
use App\Models\KanBanStatusModel;
use Illuminate\Http\Request;

class KanBanController extends Controller
{
    public function index()
    {
        $statuses = KanBanStatusModel::all();
        $items = KanBanItemModel::orderBy('priority')
            ->get()
            ->groupBy('kan_ban_status_model_id');

        $products = KanBanProductModel::all()
            ->groupBy("kan_ban_item_model_id");

        return view("kanban.index", compact("statuses", "items", "products"));
    }


    public function statusForm()
    {
        return view("kanban.create_status");
    }

    public function createStatus(Request $request)
    {

        $data = $request->validate([
            "title" => 'required|string|max:255',
            "colour" => 'required',
            "priority" => "required|integer|min:1",
        ]);


        KanBanStatusModel::create($data);

        return redirect()
            ->route('kanban.index')
            ->with('success', 'Status created successfully!');
    }


    public function itemForm()
    {
        return view("kanban.create_item");
    }

    public function createItem(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string|max:255',
            "description" => "required",
            "priority" => "required|integer|min:1",
        ]);
        $data["kan_ban_status_model_id"] = 1;

        $item = KanBanItemModel::create($data);


        for ($i = 0; $i < count($request->product); $i++) {
            $title = $request->product[$i];
            $amount = $request->productAmount[$i];
            $cost = $request->productCost[$i];
            $description = $request->productDescription[$i];
            $data = ["name" => $title, "description" => $description, "amount" => $amount, "cost" => $cost, "kan_ban_item_model_id" => $item->id];

            KanBanProductModel::create($data);
        }

        return redirect()
            ->route('kanban.index')
            ->with('success', 'Item created successfully!');
    }

    public function increaseItem(Request $request)
    {
        $item_id = $request->id;
        $item = KanBanItemModel::whereId($item_id)->first();
        $oldStatus = $item->kan_ban_status_model_id;
        $item->update(["kan_ban_status_model_id" => $oldStatus + 1]);
        return redirect()->route('kanban.index');
    }
    
    public function decreaseItem(Request $request)
    {
        $item_id = $request->id;
        $item = KanBanItemModel::whereId($item_id)->first();
        $oldStatus = $item->kan_ban_status_model_id;
        $item->update(["kan_ban_status_model_id" => $oldStatus - 1]);
        return redirect()->route('kanban.index');
    }
}

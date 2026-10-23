<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KanBanItemModel;
use App\Models\KanBanProductModel;
use App\Models\KanBanStatusModel;
use Illuminate\Http\Request;

class KanBanController extends Controller
{

    private function get_global_data(): array
    {
        $data = [];


        $products = KanBanProductModel::all()->groupBy("kan_ban_item_model_id");

        $costs = 0;
        $amountPaid = 0;
        foreach ($products as $product) {
            foreach ($product as $item) {
                $costs += ($item->amount * $item->cost);
                $amountPaid += $item->amount_paid_for;
            }
        }

        $paymentOverview = [
            "costs" => $costs,
            "amountPaid" => $amountPaid,
        ];

        $data = [
            "paymentOverview" => $paymentOverview,
        ];
        return $data;
    }
    public function index()
    {
        $statuses = KanBanStatusModel::all();

        $statusDropdown = [];

        foreach ($statuses as $status) {
            $data = ["id" => $status->id, "title" => $status->title];
            $statusDropdown[] = $data;
        }

        $items = KanBanItemModel::orderBy('priority')
            ->get()
            ->groupBy('kan_ban_status_model_id');

        $products = KanBanProductModel::all()
            ->groupBy("kan_ban_item_model_id");




        $data = $this->get_global_data();

        $data = array_merge($data, [
            "statuses" => $statuses,
            "statusDropdown" => $statusDropdown,
            "items" => $items,
            "products" => $products,
        ]);
        return view("kanban.index", compact("data"));
    }


    public function statusForm()
    {
        $data = $this->get_global_data();
        return view("kanban.create_status", $data);
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


    public function itemForm(int $item_id = 0)
    {
        $itemData = [];
        if ($item_id != 0) {
            $item = KanBanItemModel::where("id", $item_id)->get()->first();

            if (!$item) {
                return redirect()->route('kanban.index')->with("error", "Item not found");
            }

            $products = KanBanProductModel::where("kan_ban_item_model_id", $item_id)->get();
            $itemData = ["item" => $item, "products" => $products];
        }
        $data = $this->get_global_data();

        $data = array_merge($data, $itemData);

        return view("kanban.item_form", $data);
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

    public function changeStatus(Request $request)
    {
        $item_id = (int) $request->item_id;
        $status_id = (int) $request->status;

        $hasItemId   = isset($item_id);
        $hasStatusId = isset($status_id);

        if (! $hasItemId || ! $hasStatusId) {
            $message = match (true) {
                ! $hasItemId && ! $hasStatusId => 'No item id and no status id',
                ! $hasItemId                 => 'No item id',
                default                    => 'No status id',
            };

            return redirect()
                ->back()
                ->with('error', $message);
        }

        $item = KanBanItemModel::where("id", $item_id)->first();
        if (!$item) {
            return redirect()
                ->route('kanban.index')
                ->with('error', 'Item not found');
        }
        $updatedItem = $item->update(["kan_ban_status_model_id" => $status_id]);

        if (!$updatedItem) {
            return redirect()
                ->route('kanban.index')
                ->with('error', 'Item not updated');
        }
        return redirect()
            ->route('kanban.index')
            ->with('success', 'Status changed successfully!');
    }

    public function changeAmountPaidFor(Request $request)
    {
        $product_id = (int) $request->product_id;
        $amount_paid_for = (int) $request->amount_paid_for;

        $hasProductId = isset($product_id);
        $hasAmountPaidFor = isset($amount_paid_for);

        if (!$hasProductId || !$hasAmountPaidFor) {
            $message = match (true) {
                !$hasProductId && !$hasAmountPaidFor => "No product id and no amount paid for",
                ! $hasProductId => "No product id",
                default => "No amount paid for",
            };
            return redirect()
                ->route("kanban.index")
                ->with("error", $message);
        }

        $product = KanBanProductModel::where("id", $product_id);

        if (!$product) {
            return redirect()
                ->route("kanban.index")
                ->with("error", "No product found");
        }

        $updatedProduct = $product->update(["amount_paid_for" => $amount_paid_for]);

        if (!$updatedProduct) {
            return redirect()
                ->route("kanban.index")
                ->with("error", "Amount paid not saved");
        }
        return redirect()
            ->route("kanban.index")
            ->with("success", "Amount saved");
    }

    public function productForm(int $product_id = 0)
    {
        $productData = ["title" => "Create product"];
        if ($product_id != 0) {
            $product = KanBanProductModel::where("id", $product_id)->get()->first();
            if (!$product) {
                return redirect()
                    ->route("kanban.index")
                    ->with("error", "Product not found");
            }

            $productData = ["product_id" => $product->id, "name" => $product->name, "description" => $product->description, "cost" => $product->cost, "amount" => $product->amount, 'title' => "Edit product"];
        }

        $data =  $this->get_global_data();
        $data = array_merge($data, $productData);

        return view("kanban.product_form", compact("data"));
    }

    public function updateProduct(Request $request)
    {
        $validatedData = $request->validate([
            "product_id" => "integer|required",
            "title" => "required|string",
            "description" => "required|string",
            "cost" => "required|integer",
            "amount" => "required|integer",
        ]);

        KanBanProductModel::where("id", $validatedData["product_id"])->update(["name" => $validatedData["title"], "description" => $validatedData["description"], "cost" => $validatedData["cost"], "amount" => $validatedData["amount"],]);

        return redirect()
            ->route("kanban.index")
            ->with("success", "Product updated");
    }

    public function deleteProduct(Request $request)
    {
        $product_id = (int) $request->product_id;

        if (!isset($product_id)) {
            return redirect()
                ->route("kanban.index")
                ->with("error", "No product id");
        }

        KanbanProductModel::where("id", $product_id)->delete();

        return redirect()
            ->route("kanban.index")
            ->with('success', "Product deleted");
    }

    public function deleteItem(Request $request)
    {
        $item_id = (int) $request->item_id;

        if (!isset($item_id)) {
            return redirect()->route("kanban.index")->with("error", "No item id");
        }

        KanBanItemModel::where("id", $item_id)->delete();

        return redirect()->route("kanban.index")->with('success', "Item deleted");
    }
}

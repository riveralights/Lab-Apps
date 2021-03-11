<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InventoryRequest;
use App\Models\Category;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $invetories = Inventory::orderBy('created_at', 'ASC')->get();
        return view('pages.admin.inventory.index', [
            'inventories' => $invetories,
        ]);
    }

    public function create()
    {
        return view('pages.admin.inventory.create', [
            'categories' => Category::get()
        ]);
    }

    public function store(InventoryRequest $request)
    {
        $data = $request->validated();
        $inventory = Inventory::create($data);
        return redirect()->route('inventory.index')->with('success', "Data <b>" . $inventory->name . "</b> berhasil di tambahkan");
    }

    public function edit(Inventory $inventory) {
        return view('pages.admin.inventory.edit', [
            'inventory' => $inventory,
            'categories' => Category::get(),
        ]);
    }

    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $data = $request->validated();
        $inventory->update($data);
        return redirect()->route('inventory.index')->with('success', "Data <b>" . $inventory->name . "</b> berhasil di ubah");
    }

    public function destroy(Inventory $inventory)
    {
        $old_name = $inventory->name;
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', "Data <b>" . $old_name . "</b> berhasil di hapus");
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}

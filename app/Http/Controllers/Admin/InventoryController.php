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

    public function store(Request $request)
    {
        $request->validate([
            'brand'         => 'required|max:30|min:2',
            'name'          => 'required|min:2|max:255',
            'category_id'   => 'required|integer|exists:categories,id',
            'buy_date'      => 'required|date',
            'unboxing_date' => 'required|date',
            'condition'     => 'required|in:Rusak,Baik,Hilang',
            'description'   => 'nullable'
        ], [
            'brand.required'         => 'Nama merk wajib diisi',
            'brand.min'              => 'Nama merk minimal 2 karakter',
            'brand.max'              => 'Nama merk maksimal 30 karakter',
            'name.required'          => 'Nama barang wajib diisi',
            'name.min'               => 'Nama barang minimal 2 karakter',
            'name.max'               => 'Nama barang maksimal 255 karakter',
            'category_id.required'   => 'Nama ruangan wajib dipilih.',
            'buy_date.required'      => 'Tanggal pembelian wajib diisi',
            'unboxing_date.required' => 'Tanggal pemakaian pertama wajib diisi',
            'condition.required'     => 'Kondisi barang wajib diisi',
        ]);

        $data = $request->all();

        $inventory = Inventory::create($data);

        return redirect()->route('inventory.index')->with('success', "Data <b>" . $inventory->name . "</b> berhasil di tambahkan");
    }

    public function edit(Inventory $inventory) {
        return view('pages.admin.inventory.edit', [
            'inventory' => $inventory,
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, Inventory $inventory)
    {
         $request->validate([
            'brand'         => 'required|max:30|min:2',
            'name'          => 'required|min:2|max:255',
            'category_id'   => 'required|integer|exists:categories,id',
            'buy_date'      => 'required|date',
            'unboxing_date' => 'required|date',
            'condition'     => 'required|in:Rusak,Baik,Hilang',
            'description'   => 'nullable'
        ], [
            'brand.required'         => 'Nama merk wajib diisi',
            'brand.min'              => 'Nama merk minimal 2 karakter',
            'brand.max'              => 'Nama merk maksimal 30 karakter',
            'name.required'          => 'Nama barang wajib diisi',
            'name.min'               => 'Nama barang minimal 2 karakter',
            'name.max'               => 'Nama barang maksimal 255 karakter',
            'category_id.required'   => 'Nama ruangan wajib dipilih.',
            'buy_date.required'      => 'Tanggal pembelian wajib diisi',
            'unboxing_date.required' => 'Tanggal pemakaian pertama wajib diisi',
            'condition.required'     => 'Kondisi barang wajib diisi',
        ]);

        $data = $request->all();

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

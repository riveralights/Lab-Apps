<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\InventoryRequest;

class InventoryController extends Controller
{
    public function index()
    {
        $invetories = Inventory::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.inventory.index', [
            'inventories' => $invetories,
        ]);
    }

    public function create()
    {
        return view('pages.admin.inventory.create', [
            'categories' => Category::get(),
            'laboratories' => Laboratory::get(),
        ]);
    }

    public function store(InventoryRequest $request)
    {
        $request->validate([
            'serial_number' => 'required|min:3|unique:inventories,serial_number,',
        ], [
            'serial_number.unique' => 'Serial number sudah ada',
        ]);
        $data = $request->all();
        $inventory = Inventory::create($data);
        return redirect()->route('inventory.index')->with('success', "Data <b>" . $inventory->name . "</b> berhasil di tambahkan");
    }

    public function show(Inventory $inventory)
    {
        return view('pages.admin.inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory) {
        return view('pages.admin.inventory.edit', [
            'inventory' => $inventory,
            'categories' => Category::get(),
            'laboratories' => Laboratory::get(),
        ]);
    }

    public function update(InventoryRequest $request, Inventory $inventory)
    {
        $request->validate([
            'serial_number'   => 'required|min:3|unique:inventories,serial_number,' . $inventory->id,
        ], [
            'serial_number.unique'     => 'Serial Number sudah ada',
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

    public function monthlyInventory(Request $request){
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $inventories = Inventory::whereBetween('created_at',[$start_date,$end_date])->get();
        
        $pdf = PDF::loadView('pages.admin.inventory.monthly-print', ['inventories' => $inventories, 'start_date' => $start_date, 'end_date' => $end_date])->setPaper('a4', 'landscape');
        return $pdf->download('rekap-aset.pdf');
    }
}

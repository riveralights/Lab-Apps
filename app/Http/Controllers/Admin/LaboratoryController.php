<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::orderBy('name', 'ASC')->get();
        return view('pages.admin.laboratory.index', [
            'laboratories' => $laboratories,
        ]);
    }

    public function create()
    {
        return view('pages.admin.laboratory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|max:50|min:3',
            'code'   => 'required|min:3|max:6|unique:laboratories,code,',
            'author' => 'required|min:3|max:75'
        ]);
        
        $data = $request->all();

        $laboratory = Laboratory::create($data);

        return redirect()->route('laboratory.index')->with('success', "Data <b>" . $laboratory->name . "</b> berhasil di tambahkan");
    }

    public function edit(Laboratory $laboratory)
    {
        return view('pages.admin.laboratory.edit', [
            'laboratory' => $laboratory,
        ]);
    }

    public function update(Request $request, Laboratory $laboratory)
    {
        $request->validate([
            'name'   => 'required|max:50|min:3',
            'code'   => 'required|min:3|max:6|unique:laboratories,code,' . $laboratory->id,
            'author' => 'required|min:3|max:75'
        ]);

        $data = $request->all();

        $laboratory->update($data);

        return redirect()->route('laboratory.index')->with('success', "Data <b>" . $laboratory->name . "</b> berhasil di ubah");
    }

    public function destroy(Laboratory $laboratory)
    {
        $old_name = $laboratory->name;
        $laboratory->delete();

        return redirect()->route('laboratory.index')->with('success', "Data <b>" . $old_name . "</b> berhasil di hapus");
    }
}

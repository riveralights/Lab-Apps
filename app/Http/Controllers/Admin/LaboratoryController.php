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
        ], [
            'name.required'   => 'Nama ruangan wajib diisi',
            'name.max'        => 'Nama ruangan maksimal 50 karakter',
            'name.min'        => 'Nama ruangan minimal 3 karakter',
            'code.required'   => 'Kode ruangan wajib diisi',
            'code.min'        => 'Kode ruangan minimal 3 karakter',
            'code.max'        => 'Kode ruangan maksimal 6 karakter',
            'code.unique'     => 'Kode ruangan sudah ada',
            'author.required' => 'Nama penanggung jawab wajib diisi',
            'author.min'      => 'Nama penanggung jawab minimal 3 karakter',
            'author.max'      => 'Nama penanggung jawab maksimal 75 karakter'
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
        ], [
            'name.required'   => 'Nama ruangan wajib diisi',
            'name.max'        => 'Nama ruangan maksimal 50 karakter',
            'name.min'        => 'Nama ruangan minimal 3 karakter',
            'code.required'   => 'Kode ruangan wajib diisi',
            'code.min'        => 'Kode ruangan minimal 3 karakter',
            'code.max'        => 'Kode ruangan maksimal 6 karakter',
            'code.unique'     => 'Kode ruangan sudah ada',
            'author.required' => 'Nama penanggung jawab wajib diisi',
            'author.min'      => 'Nama penanggung jawab minimal 3 karakter',
            'author.max'      => 'Nama penanggung jawab maksimal 75 karakter'
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

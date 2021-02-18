<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::orderBy('created_at', 'DESC')->get();
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
}

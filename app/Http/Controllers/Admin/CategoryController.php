<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('pages.admin.category.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('pages.admin.category.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,'
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max'      => 'Nama kategori tidak boleh lebih dari 100 karakter',
            'name.unique'   => 'Nama kategori sudah ada'
        ]);

        $data = $request->all();

        $category = Category::create($data);

        return redirect()->route('category.index')->with('success', "Data <b>" . $category->name . "</b> berhasil di tambahkan");
    }

    public function edit(Category $category)
    {
        return view('pages.admin.category.edit', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100|unique:categories,name,' . $category->id
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.max'      => 'Nama kategori tidak boleh lebih dari 100 karakter',
            'name.unique'   => 'Nama kategori sudah ada'
        ]);

        $data = $request->all();
        $category->update($data);

        return redirect()->route('category.index')->with('success', "Data <b>" . $category->name . "</b> berhasil di ubah");
    }

    public function destroy(Category $category)
    {
        $old_name = $category->name;
        $category->delete();

        return redirect()->route('category.index')->with('success', "Data <b>" . $old_name . "</b> berhasil di hapus");
    }
}

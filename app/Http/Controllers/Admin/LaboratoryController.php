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
}

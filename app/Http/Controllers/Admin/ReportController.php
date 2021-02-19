<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::with(['laboratory'])->orderBy('name', 'ASC')->get();
        return view('pages.admin.report.index', [
            'reports' => $reports
        ]);
    }

    public function create()
    {
        $laboratories = Laboratory::get();
        return view('pages.admin.report.create', [
            'laboratories' => $laboratories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:75|min:3',
            'lesson'        => 'required|max:50',
            'laboratory_id' => 'integer|exists:laboratories,id',
            'starting_date' => 'required',
            'end_date'      => 'required',
            'description'   => 'required'
        ]);

        $reportsuccess = Report::create($request->all());

        return redirect()->route('detail.create', $reportsuccess->id)->with('warning', "Silahkan isi detail peminjaman barang");
    }

    public function show(Report $report)
    {
        return view('pages.admin.report.show', [
            'report' => $report,
        ]);
    }
}

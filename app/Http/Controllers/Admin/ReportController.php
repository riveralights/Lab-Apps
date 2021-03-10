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
        ], [
            'name.required'          => 'Nama laboran wajib diisi',
            'name.max'               => 'Nama laboran maksimal 75 karakter',
            'name.min'               => 'Nama laboran minimal 3 karakter',
            'lesson.required'        => 'Nama pelajaran wajib diisi',
            'lesson.max'             => 'Nama pelajaran maksimal 50 karakter',
            'starting_date.required' => 'Tanggal / waktu mulai wajib diisi',
            'end_date.required'      => 'Tanggal / waktu akhir wajib diisi',
            'description.required'   => 'Keterangan wajib diisi',
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

    public function edit(Report $report)
    {
        return view('pages.admin.report.edit', [
            'laboratories' => Laboratory::get(),
            'report' => $report
        ]);
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'name'          => 'required|max:75|min:3',
            'lesson'        => 'required|max:50',
            'laboratory_id' => 'integer|exists:laboratories,id',
            'starting_date' => 'required',
            'end_date'      => 'required',
            'description'   => 'required'
        ], [
            'name.required'          => 'Nama laboran wajib diisi',
            'name.max'               => 'Nama laboran maksimal 75 karakter',
            'name.min'               => 'Nama laboran minimal 3 karakter',
            'lesson.required'        => 'Nama pelajaran wajib diisi',
            'lesson.max'             => 'Nama pelajaran maksimal 50 karakter',
            'starting_date.required' => 'Tanggal / waktu mulai wajib diisi',
            'end_date.required'      => 'Tanggal / waktu akhir wajib diisi',
            'description.required'   => 'Keterangan wajib diisi',
        ]);

        $data = $request->all();

        $report->update($data);

        return redirect()->route('report.index')->with('success', "Data berhasil di ubah");
    }

    public function destroy(Report $report)
    {
        $old_name = $report->name;
        $report->delete();

        return redirect()->route('report.index')->with('success', "Data <b>" . $old_name . "</b> berhasil di hapus");
    }
}

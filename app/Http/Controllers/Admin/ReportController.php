<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Report;
use App\Models\Laboratory;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index(Request $request)
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

        $reportsuccess = auth()->user()->reports()->create($request->all());

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

    public function personalPrint(Report $report)
    {
        $pdf = PDF::loadView('pages.admin.report.personal-print', ['report' => $report]);
        return $pdf->download('berita_acara.pdf');
    }

    public function monthlyReport(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->toDateTimeString();
        $end_date = Carbon::parse($request->end_date)->toDateTimeString();
        $reports = Report::whereBetween('created_at',[$start_date,$end_date])->get();

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('pages.admin.report.monthly-print', ['reports' => $reports, 'start_date' => $start_date, 'end_date' => $end_date])->setPaper('a4', 'landscape');
        return $pdf->download('rekap_berita_acara.pdf');
    }
}

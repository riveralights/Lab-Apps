<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReportDetail;

class ReportDetailController extends Controller
{
    public function create($report_id)
    {
        $report = Report::findOrFail($report_id);
        $report_detail = ReportDetail::where('report_id', $report_id)->get();

        return view('pages.admin.report.detail.create', [
            'report' => $report,
            'report_detail' => $report_detail
        ]);
        
    }

    public function store(Request $request, $report_id)
    {
        $report = Report::findOrFail($report_id);

        $request->validate([
            'name'             => 'required|max:75|min:3',
            'quantity'         => 'required|numeric',
            'condition_before' => 'required',
            'condition_after'  => 'required'
        ], [
            'name.required' => 'Nama aset wajib diisi',
            'name.max' => 'Nama aset maksimal 75 karakter',
            'name.min' => 'Nama aset minimal 3 karakter',
            'quantity.required' => 'Jumlah aset wajib diisi',
        ]);

        $data = $request->all();
        $data['report_id'] = $report->id;

        ReportDetail::create($data);

        return redirect()->route('detail.create', $report)->with('success', "Data berhasil ditambahkan");
    }

    public function destroy($detail_id)
    {
        $item = ReportDetail::findOrFail($detail_id);
        $report = Report::findOrFail($item->report_id);
        $item->delete();
        return redirect()->route('detail.create', $report)->with('success', "Data berhasil dihapus");
    }
}

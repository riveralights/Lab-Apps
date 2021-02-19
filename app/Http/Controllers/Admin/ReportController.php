<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Report;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function create()
    {
        return view('pages.report.create');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        $data = json_decode($report->data);
        return view('pages.report.show', compact('report', 'data'));
    }
    public function monthly ($month, $year) {
        return view('pages.report.monthly-report', compact('month', 'year'));
    }
}

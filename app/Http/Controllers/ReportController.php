<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show($id){
        $report = Report::findOrFail($id);
        $data= json_decode($report->data);
        return view('pages.report.show',compact('report','data'));
    }
}

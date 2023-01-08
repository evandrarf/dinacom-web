<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function store(Request $request)
    {
        $report = new Report();

        $report->name = $request->name;
        $report->amount = $request->amount;
        $report->note = $request->note;
        $report->date = $request->date;
        $report->type = $request->type;

        $report->save();

        return redirect()->route('dashboard.actions');
    }

    public function getReportInRange()
    {
    }
}

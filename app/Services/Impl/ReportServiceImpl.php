<?php

namespace App\Services\Impl;

use App\Models\Report;
use App\Services\ReportService;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportServiceImpl implements ReportService
{
    public $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    function getAllBalance(): int
    {
        return $this->getIncomeBalance() - $this->getSpendingBalance();
    }

    function getIncomeBalance(): int
    {
        $incomeReports = Report::select('amount')->where('type', 'income')->get();

        $incomeBalance = 0;

        foreach ($incomeReports as $incomeReport) {
            $incomeBalance += $incomeReport['amount'];
        }

        return $incomeBalance;
    }

    function getSpendingBalance(): int
    {
        $spendingReports = Report::select('amount')->where('type', 'spending')->get();

        $spendingBalance = 0;

        foreach ($spendingReports as $spendingReport) {
            $spendingBalance += $spendingReport['amount'];
        }

        return $spendingBalance;
    }

    function getAllReports(): array
    {
        return Report::latest()->get();
    }

    function getReportsInMonth($month)
    {
        $reports = Report::select('*')
            ->whereMonth('date', $month)
            ->get();


        return $reports;
    }

    function getMonthBalance($month): int
    {

        return $this->getMonthIncomeBalance($month) - $this->getMonthSpendingBalance($month);
    }

    function getMonthReport($month)
    {
        return Report::select('*')
            ->whereMonth('date', $month)
            ->get();
    }

    function getMonthSpendingBalance($month): int
    {
        $reports = $this->getMonthReport($month);

        $balance = 0;
        foreach ($reports as $report) {
            if ($report['type'] == 'spending') {
                $balance += $report['amount'];
            }
        }
        return $balance;
    }

    function getMonthIncomeBalance($month): int
    {
        $reports = $this->getMonthReport($month);

        $balance = 0;
        foreach ($reports as $report) {
            if ($report['type'] == 'income') {
                $balance += $report['amount'];
            }
        }
        return $balance;
    }

    function getDayReport($day)
    {
        return Report::select('*')
            ->whereDate('created_at', $day)->latest()->get();
    }

    function getWeekReports($week)
    {
        return Report::select("*")
            ->whereBetween(
                'date',
                $week
            )
            ->get();
    }

    function getWeekIncomeOne($week)
    {
        $reports = $this->getWeekReports($week);
        $income = [];

        $days = $this->days;

        foreach ($days as $day) {
            $income[$day] = 0;
        }


        foreach ($reports as $report) {
            $day = Carbon::createFromFormat('Y-m-d', $report->date)->format('l');

            if ($report->type == 'income') {
                $income[$day] += $report->amount;
            }
        }

        return $income;
    }

    function getWeekSpendingOne($week)
    {
        $reports = $this->getWeekReports($week);

        $spending = [];

        $days = $this->days;

        foreach ($days as $day) {
            $spending[$day] = 0;
        }


        foreach ($reports as $report) {
            $day = Carbon::createFromFormat('Y-m-d', $report->date)->format('l');
            if ($report->type == 'spending') {
                // dd($spending);
                $spending[$day] += $report->amount;
            }
        }
        return $spending;
    }
}

<?php

namespace App\Services\Impl;

use App\Models\Report;
use App\Services\ReportService;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReportServiceImpl implements ReportService
{
    public $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    public $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    function getAllBalance(): int
    {
        return $this->getIncomeBalance() - $this->getSpendingBalance();
    }

    function getIncomeBalance(): int
    {
        $incomeReports = Report::where('user_id', auth()->user()->id)->select('amount')->where('type', 'income')->get();

        $incomeBalance = 0;

        foreach ($incomeReports as $incomeReport) {
            $incomeBalance += $incomeReport['amount'];
        }

        return $incomeBalance;
    }

    function getSpendingBalance(): int
    {
        $spendingReports = Report::where('user_id', auth()->user()->id)->select('amount')->where('type', 'spending')->get();

        $spendingBalance = 0;

        foreach ($spendingReports as $spendingReport) {
            $spendingBalance += $spendingReport['amount'];
        }

        return $spendingBalance;
    }

    function getAllReports()
    {
        return Report::where('user_id', auth()->user()->id)->latest()->get();
    }

    function getReportsInMonth($month)
    {
        $reports = Report::where('user_id', auth()->user()->id)->select('*')
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
        return Report::where('user_id', auth()->user()->id)->select('*')
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
        return Report::where('user_id', auth()->user()->id)->select('*')
            ->whereDate('created_at', $day)->latest()->get();
    }

    function getYearReports($year)
    {
        return Report::where('user_id', auth()->user()->id)->whereYear('date', $year)->get();
    }

    function getWeekReports($week)
    {
        return Report::where('user_id', auth()->user()->id)->select("*")
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

        $balance = [];

        $days = $this->days;

        foreach ($days as $day) {
            $balance[$day] = 0;
        }


        foreach ($reports as $report) {
            $day = Carbon::createFromFormat('Y-m-d', $report->date)->format('l');
            if ($report->type == 'spending') {
                $balance[$day] += $report->amount;
            }
        }
        return $balance;
    }

    function getMonthSpendingOne($date)
    {
        $reports = $this->getMonthReport($date->month);
        $totalDays = $this->getMonthTotalDays($date);

        $balance = [];

        for ($i = 1; $i <= $totalDays; $i++) {
            $balance[$i] = 0;
        }

        foreach ($reports as $report) {
            if ($report->type == 'spending') {
                $reportDate = (int)Carbon::createFromFormat('Y-m-d', $report->date)->format('d');
                $balance[$reportDate] += $report->amount;
            }
        }

        return $balance;
    }

    function getMonthTotalDays($date)
    {
        return $date->daysInMonth;
    }

    function getMonthIncomeOne($date)
    {
        $reports = $this->getMonthReport($date->month);
        $totalDays = $this->getMonthTotalDays($date);

        $balance = [];

        for ($i = 1; $i <= $totalDays; $i++) {
            $balance[$i] = 0;
        }

        foreach ($reports as $report) {
            if ($report->type == 'income') {
                $reportDate = (int)Carbon::createFromFormat('Y-m-d', $report->date)->format('d');
                $balance[$reportDate] += $report->amount;
            }
        }

        return $balance;
    }

    function getYearSpendingOne($year)
    {
        $reports = $this->getYearReports($year);
        $months = $this->months;

        $balance = [];

        foreach ($months as $month) {
            $balance[$month] = 0;
        }

        foreach ($reports as $report) {
            $month = Carbon::createFromFormat('Y-m-d', $report->date)->format('M');
            if ($report->type == 'spending') {
                $balance[$month] += $report->amount;
            }
        }
        return $balance;
    }
    function getYearIncomeOne($year)
    {
        $reports = $this->getYearReports($year);
        $months = $this->months;

        $balance = [];

        foreach ($months as $month) {
            $balance[$month] = 0;
        }

        foreach ($reports as $report) {
            $month = Carbon::createFromFormat('Y-m-d', $report->date)->format('M');
            if ($report->type == 'income') {
                $balance[$month] += $report->amount;
            }
        }
        return $balance;
    }
}

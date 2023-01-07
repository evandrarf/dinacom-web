<?php

namespace App\Services\Impl;

use App\Models\Report;
use App\Services\ReportService;
use Illuminate\Http\Request;


class ReportServiceImpl implements ReportService
{
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
        return Report::get();
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
            ->whereDate('created_at', $day)
            ->get();
    }
}

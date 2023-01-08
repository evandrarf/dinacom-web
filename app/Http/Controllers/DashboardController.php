<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    private ReportService $reportService;

    public function __construct(ReportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        $allBalance = $this->reportService->getAllBalance();
        $spendingBalance = $this->reportService->getSpendingBalance();
        $incomeBalance = $this->reportService->getIncomeBalance();


        $thisMonthBalance = $this->reportService->getMonthBalance(Carbon::now()->month);
        $lastMonthBalance = $this->reportService->getMonthBalance(Carbon::now()->subMonth()->format('m'));
        $twoMonthsBeforeBalance = $this->reportService->getMonthBalance(Carbon::now()->subMonths(2)->format('m'));
        $balanceDiffLastMonthPercentage = $twoMonthsBeforeBalance;

        if ($twoMonthsBeforeBalance != 0) {

            $balanceDiffLastMonthPercentage = ($lastMonthBalance - $twoMonthsBeforeBalance) / $twoMonthsBeforeBalance * 100;
        }


        $balanceDiff = $thisMonthBalance - $lastMonthBalance;
        $balanceDiffPercentage = $thisMonthBalance;

        if ($lastMonthBalance != 0) {
            $balanceDiffPercentage = $balanceDiff / $lastMonthBalance * 100;
        }

        $thisMonthIncome = $this->reportService->getMonthIncomeBalance(Carbon::now()->month);
        $thisMonthSpending =  $this->reportService->getMonthSpendingBalance(Carbon::now()->month);

        // dd($this->reportService->getMonthIncomeBalance(Carbon::now()->month));
        // dd(Carbon::today()->toDateString());
        // dd($this->reportService->getDayReport(Carbon::today()->toDateString()));

        $todayReports = $this->reportService->getDayReport(Carbon::today()->toDateString());
        $yesterdayReports = $this->reportService->getDayReport(Carbon::yesterday()->toDateString());

        return view('dashboard.index', [
            'user' => auth()->user(),
            'allBalance' => $allBalance,
            'incomeBalance' => $incomeBalance,
            'spendingBalance' => $spendingBalance,
            'thisMonthBalance' => $thisMonthBalance,
            'lastMonthBalance' => $lastMonthBalance,
            'balanceDiffPercentage' => $balanceDiffPercentage,
            'balanceDiffLastMonthPercentage' => $balanceDiffLastMonthPercentage,
            'thisMonthSpending' => $thisMonthSpending,
            'thisMonthIncome' => $thisMonthIncome,
            'date' => Carbon::now(),
            'todayReports' => $todayReports,
            'yesterdayReports' => $yesterdayReports
        ]);
    }

    public function stats()
    {
        $week = [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()];
        $weekSpending = $this->reportService->getWeekSpendingOne($week);
        $weekIncome = $this->reportService->getWeekIncomeOne($week);

        $day = $this->reportService->days;
        return view('dashboard.statistics', [
            'user' => auth()->user(),
            'spendingData' => $weekSpending,
            'incomeData' => $weekIncome,
            'labelData' => $day,
        ]);
    }

    public function actions()
    {
        return view('dashboard.actions', ['user' => auth()->user()]);
    }

    public function settings(Request $request)
    {
        return view('dashboard.settings', ['user' => $request->user()]);
    }
}

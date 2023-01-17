<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
            'yesterdayReports' => $yesterdayReports,
            'title' => "Home | Financekuu"
        ]);
    }

    public function stats(Request $request)
    {
        $rangeTime = $request->query('rangeTime');

        $spendingData = null;
        $incomeData = null;
        $labelData = [];

        if ($rangeTime == 'month') {
            $date = Carbon::now();
            $spendingData = $this->reportService->getMonthSpendingOne($date);
            $incomeData = $this->reportService->getMonthIncomeOne($date);
            for ($i = 1; $i <= $this->reportService->getMonthTotalDays($date); $i++) {
                $labelData[] = (string)$i;
            }
        } else if ($rangeTime == 'year') {
            $year = Carbon::now()->year;
            $spendingData = $this->reportService->getYearSpendingOne($year);
            $incomeData = $this->reportService->getYearIncomeOne($year);
            $labelData = $this->reportService->months;
        } else {

            $week = [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()];
            $spendingData = $this->reportService->getWeekSpendingOne($week);
            $incomeData = $this->reportService->getWeekIncomeOne($week);
            $labelData = $this->reportService->days;
        }

        $reports = $this->reportService->getAllReports();

        $events = Event::where('user_id', $request->user()->id)->latest()->get();

        return view('dashboard.statistics', [
            'user' => auth()->user(),
            'spendingData' => $spendingData,
            'incomeData' => $incomeData,
            'labelData' => $labelData,
            'rangeTimeSelected' => $rangeTime,
            'title' => "Statistics | Financekuu",
            'reports' => $reports,
            'events' => $events,
            'date' => Carbon::now()
        ]);
    }

    public function actions()
    {

        return redirect()->route('dashboard.actions.reports');
    }

    public function events(Request $request)
    {
        $reports = $this->reportService->getAllReports();

        $events = Event::where('user_id', $request->user()->id)->latest()->get();
        return view('dashboard.actions', ['user' => auth()->user(), 'title' => 'Actions | Financekuu', 'reports' => $reports, 'events' => $events]);
    }

    public function reports(Request $request)
    {
        $reports = $this->reportService->getAllReports();

        $events = Event::where('user_id', $request->user()->id)->latest()->get();
        return view('dashboard.actions', ['user' => auth()->user(), 'title' => 'Actions | Financekuu', 'reports' => $reports, 'events' => $events]);
    }

    public function settings(Request $request)
    {
        return view('dashboard.settings', ['user' => $request->user(), 'title' => "Settings | Financekuu"]);
    }
}

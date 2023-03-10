<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ReportService
{
    function getAllBalance(): int;

    function getIncomeBalance(): int;

    function getSpendingBalance(): int;

    function getAllReports();

    function getReportsInMonth($month);

    function getMonthBalance($month): int;

    function getMonthSpendingBalance($month): int;

    function getMonthIncomeBalance($month): int;

    function getMonthReport($month);

    function getDayReport($day);

    function getWeekIncomeOne($week);

    function getWeekSpendingOne($week);

    function getWeekReports($week);

    function getMonthSpendingOne($date);

    function getMonthIncomeOne($date);

    function getYearReports($year);

    function getYearSpendingOne($year);

    function getYearIncomeOne($year);
    function getMonthTotalDays($date);
}

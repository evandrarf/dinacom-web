<?php

namespace App\Services;

use Illuminate\Http\Request;

interface ReportService
{
    function getAllBalance(): int;

    function getIncomeBalance(): int;

    function getSpendingBalance(): int;

    function getAllReports(): array;

    function getReportsInMonth($month);

    function getMonthBalance($month): int;

    function getMonthSpendingBalance($month): int;

    function getMonthIncomeBalance($month): int;

    function getMonthReport($month);

    function getDayReport($day);
}

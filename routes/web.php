<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard/stats', [DashboardController::class, 'stats'])->middleware(['auth', 'verified'])->name('dashboard.stats');
Route::get('/dashboard/actions', [DashboardController::class, 'actions'])->middleware(['auth', 'verified'])->name('dashboard.actions');
Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->middleware(['auth', 'verified'])->name('dashboard.settings');

Route::get('/dashboard/actions/reports', [DashboardController::class, 'reports'])->middleware(['auth', 'verified'])->name('dashboard.actions.reports');
Route::get('/dashboard/actions/events', [DashboardController::class, 'events'])->middleware(['auth', 'verified'])->name('dashboard.actions.events');

Route::post('/reports/store', [ReportController::class, 'store'])->middleware(['auth', 'verified'])->name('reports.store');

Route::post('/events/store', [EventController::class, 'store'])->middleware(['auth', 'verified'])->name('events.store');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

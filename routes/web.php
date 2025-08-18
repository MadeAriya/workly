<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AgendaCalendarController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluasiController;

use App\Http\Controllers\PayrollController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SlipGajiController;
use App\Http\Controllers\WeeklyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'dashboardAdmin'])->name('dashboard.admin')->middleware('admin');

// Route Register
Route::middleware('admin')->group(function(){
    Route::get('/register', [RegisteredController::class, 'create'])->name('user.index');
    Route::post('/register', [RegisteredController::class, 'store'])->name('user.store');
});

// Route Login
Route::get('/login', [AuthenticateController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [AuthenticateController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

// Route Change Password
Route::post('/changepassword', [RegisteredController::class, 'changePassword'])->name('changePassword');

// Route Absen
Route::middleware('auth')->group(function () {
    Route::get('/verifyLogin', [AbsenController::class, 'create'])->name('face');
    Route::get('/manage_absensi', [AbsenController::class, 'index'])->name('manage_absensi');
    Route::post('/manage_absensi/store', [AbsenController::class, 'store'])->name('manage_absensi.store');
});

// Route agenda
Route::middleware('auth')->group(function () {
    Route::get('/manage_agenda', [AgendaController::class, 'index'])->name('manage_agenda');
    Route::get('/manage_agenda/store', [AgendaController::class, 'create'])->name('manage_agenda.create');
    Route::post('/manage_agenda/store', [AgendaController::class, 'store'])->name('manage_agenda.store');
    Route::get('/manage_agenda/edit/{id}', [AgendaController::class, 'show'])->name('manage_agenda.show');
    Route::post('/manage_agenda/edit/{id}', [AgendaController::class, 'update'])->name('manage_agenda.update');
    Route::post('/manage_agenda/delete/{id}', [AgendaController::class, 'delete'])->name('manage_agenda.delete');
    Route::post('/manage_agenda/giveskor/{id}', [AgendaController::class, 'giveSkor'])->name('manage_agenda.giveskor');
});

// Route evaluasi
Route::middleware('admin')->group(function () {
    Route::get('/manage_evaluasi', [EvaluasiController::class, 'index'])->name('manage_evaluasi');
    Route::get('/manage_evaluasi/store', [EvaluasiController::class, 'create'])->name('manage_evaluasi.create');
    Route::post('/manage_evaluasi/store', [EvaluasiController::class, 'store'])->name('manage_evaluasi.store');
});

// Route payrolls
Route::middleware('admin')->group(function () {
    Route::get('/manage_payrolls', [PayrollController::class, 'index'])->name('manage_payrolls');
    Route::get('/manage_payrolls/store', [PayrollController::class, 'create'])->name('manage_payrolls.create');
    Route::post('/manage_payrolls/store', [PayrollController::class, 'store'])->name('manage_payrolls.store');
});

// Route slip gaji
Route::middleware('admin')->group(function () {
    Route::get('/manage_slipgaji', [SLipGajiController::class, 'index'])->name('manage_slipgaji');
    Route::get('/manage_slipgaji/store', [SLipGajiController::class, 'create'])->name('manage_slipgaji.create');
    Route::post('/manage_slipgaji/store', [SLipGajiController::class, 'store'])->name('manage_slipgaji.store');
    Route::get('/manage_slipgaji/{id}/download', [SLipGajiController::class, 'download'])->name('manage_slipgaji.download');
});

// Route event calendar
Route::middleware('auth')->group(function () {
    Route::get('/manage_calendar', [AgendaCalendarController::class, 'index'])->name('manage_calender');
    Route::get('/manage_calendar/store', [AgendaCalendarController::class, 'create'])->name('manage_calendar.create');
    Route::get('/manage_calendar/event', [AgendaCalendarController::class, 'getEvent'])->name('manage_calendar.event');
    Route::post('/manage_calendar/store', [AgendaCalendarController::class, 'store'])->name('manage_calendar.store');
    Route::delete('/manage_calendar/delete/{id}', [AgendaCalendarController::class, 'destroy']);
});

// Route weekly plan
Route::middleware('auth')->group(function () {
    Route::get('/manage_weekly', [WeeklyController::class, 'index'])->name('manage_weekly');
    Route::get('/manage_weekly/store', [WeeklyController::class, 'create'])->name('manage_weekly.create');
    Route::post('/manage_weekly/store', [WeeklyController::class, 'store'])->name('manage_weekly.store');
    Route::get('/manage_weekly/edit/{id}', [WeeklyController::class, 'show'])->name('manage_weekly.show');
    Route::post('/manage_weekly/edit/{id}', [WeeklyController::class, 'update'])->name('manage_weekly.update');
    Route::post('/manage_weekly/delete/{id}', [WeeklyController::class, 'delete'])->name('manage_weekly.delete');
});

// Route untuk manage laporan user
Route::middleware('admin')->group(function () {
    Route::get('/manage_agenda/{users:username}', [AgendaController::class, 'detailAgenda'])->name('user_agenda');
    Route::get('/manage_weekly/{users:username}', [WeeklyController::class, 'detailWeekly'])->name('user_weekly');
    Route::get('/manage_absence/{users:username}', [AbsenController::class, 'detailAbsence'])->name('user_absence');
});

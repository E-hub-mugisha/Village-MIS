<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BirthRecordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeathRecordController;
use App\Http\Controllers\PopulationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalRecords = \App\Models\BirthRecord::count();
    $maleRecords = \App\Models\BirthRecord::where('gender', 'male')->count();
    $femaleRecords = \App\Models\BirthRecord::where('gender', 'female')->count();
    $recentRecords = \App\Models\BirthRecord::where('created_at', '>=', now()->subMonth())->get();

    return view('home', compact('totalRecords', 'maleRecords', 'femaleRecords', 'recentRecords'));
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('birth_records', BirthRecordController::class);
    Route::post('birth_records/create', [BirthRecordController::class, 'storeData'])->name('birth_records.store');
    // Dependent dropdown AJAX routes


    Route::get('/get-districts/{provinceId}', [BirthRecordController::class, 'getDistricts']);
    Route::get('/get-sectors/{districtId}', [BirthRecordController::class, 'getSectors']);
    Route::get('/get-cells/{sectorId}', [BirthRecordController::class, 'getCells']);
    Route::get('/get-villages/{cellId}', [BirthRecordController::class, 'getVillages']);
    Route::get('birth_records/{id}/certificate', [BirthRecordController::class, 'downloadCertificate'])->name('birth_records.certificate');

    Route::resource('death_records', DeathRecordController::class);
    Route::post('/death-records/search', [DeathRecordController::class, 'searchAndRedirect'])->name('death_records.searchAndRedirect');
    Route::get('/death-records/create', [DeathRecordController::class, 'create'])->name('death_records.create');
    Route::get('death_records/{id}/certificate', [DeathRecordController::class, 'certificate'])->name('death_records.certificate');

    Route::prefix('death-reports')->controller(ReportController::class)->group(function () {
        Route::get('/', 'deathReport')->name('death.reports.index');
        Route::post('/generate', 'generate')->name('death.reports.generate');
    });

    Route::prefix('reports')->group(function () {
        Route::get('/births', [ReportController::class, 'birthReport'])->name('birth.reports.index');
        Route::post('/births/filter', [ReportController::class, 'filter'])->name('birth.reports.generate');
    });

    Route::get('/notifications/mark-all-read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return back();
    })->name('notifications.markAllAsRead');

    Route::resource('populations', PopulationController::class);
});


Route::resource('users', UserController::class)
    ->middleware('auth');

require __DIR__ . '/auth.php';

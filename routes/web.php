<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\NurseryController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Hadhana Hub (Phase 1 MVP)
|--------------------------------------------------------------------------
*/

// Language switcher: /lang/ar or /lang/en
Route::get('/lang/{locale}', function (string $locale) {
    if (in_array($locale, config('app.supported_locales', ['ar', 'en']), true)) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

// Public directory
Route::get('/', [NurseryController::class, 'index'])->name('home');
Route::get('/nurseries/{nursery}', [NurseryController::class, 'show'])->name('nurseries.show');

// Registration / submission requests
Route::get('/submit', [SubmissionController::class, 'create'])->name('submissions.create');
Route::post('/submit', [SubmissionController::class, 'store'])->name('submissions.store');

// Simple admin workspace (demo: no auth wall to keep the MVP reviewable)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::patch('/submissions/{submission}/approve', [DashboardController::class, 'approve'])->name('submissions.approve');
    Route::patch('/submissions/{submission}/reject', [DashboardController::class, 'reject'])->name('submissions.reject');
});

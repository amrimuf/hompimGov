<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::prefix('reports')->group(function () {
    Route::get('/create', function () {return view('reports.create');})->name('reports.create');
    Route::post('/submit', [ReportController::class, 'store'])->name('reports.submit');
    Route::get('/logs/{report}', [App\Http\Controllers\ReportController::class, 'log'])->name('reports.log');
    Route::get('/search', function () {return view('reports.track');})->name('reports.search');
    Route::post('/track', [ReportController::class, 'track'])->name('reports.track');
    
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/verify/{report}', [ReportController::class, 'verify'])->name('reports.verify');
        Route::put('/update/{report}', [ReportController::class, 'update'])->name('reports.update');
    });
});
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VatCalculationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // vat calculation routes
    Route::get('vat-calculation', [VatCalculationController::class,'index'])->name('vatCalculation.index');
    Route::post('vat-calculate', [VatCalculationController::class,'vatCalculate'])->name('vatCalculation.vatCalculate');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

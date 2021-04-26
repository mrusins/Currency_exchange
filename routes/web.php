<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ShowCurrencyController;
use App\Http\Controllers\XMLController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/', [CurrencyController::class, 'index'])->name('currency.index');
Route::get('//{currency}', [ShowCurrencyController::class, 'show']);

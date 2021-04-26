<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ShowCurrencyController;
use App\Http\Controllers\XMLController;
use Illuminate\Support\Facades\Route;

//var_dump($_POST);


Route::get('/', function () {
    return view('welcome');
});
Route::get('/rates', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/rates', [CurrencyController::class, 'index'])->name('currency.index');
Route::get('/rates/{currency}', [ShowCurrencyController::class, 'show']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sales\SalesController;

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
    return redirect()->route('sales.dashboard');
});

Route::group(['prefix' => 'sales', 'as' => 'sales.'], function () {
    Route::get('dashboard',                         [SalesController::class,     'index'])->name('dashboard');
    Route::get('all-sales',                         [SalesController::class,     'salesList'])->name('all-sales');
    Route::post('all-sales',                        [SalesController::class,     'salesList'])->name('all-sales');
});
Route::resource('sales',                        SalesController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajax\AjaxController;


Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {

    Route::post('get-all-sales-records',              [AjaxController::class,     'getAllSalesRecords'])->name('get-all-sales-records');
});

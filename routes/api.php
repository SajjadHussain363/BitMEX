<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankDetailController;
use App\Http\Controllers\CurrencyDataController;
use App\Http\Controllers\StatisticsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// set bank details
Route::get('bank-details/{id}', [BankDetailController::class, 'show']);
Route::post('bank-details-store', [BankDetailController::class, 'Store']);



// set bank details local
Route::get('bank-details-local/{id}', [BankDetailController::class, 'showLocal']);
Route::post('bank-details-store-local', [BankDetailController::class, 'StoreLocal']);



// set curreny

Route::get('curreny-set/{id}', [CurrencyDataController::class, 'show']);
Route::post('curreny-set-store', [CurrencyDataController::class, 'Store']);





// show admin statisics 

Route::get('show-statsistics/{cardID?}', [StatisticsController::class, 'getTotalStats']);











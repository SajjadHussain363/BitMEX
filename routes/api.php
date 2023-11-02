<?php

use App\Http\Controllers\ComprehensiveReportController;
use App\Http\Controllers\MonthlyDetailsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
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

//Product

Route::get('/product', [ProductController::class,  'index']);
Route::post('/product/store', [ProductController::class,'store']);

//Posts
Route::get('/posts/index', [PostController::class, 'index']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('posts/{post}', [PostController::class, 'show']);

//Comprehensive Report
Route::get('/comprehensive_reports/show', [ComprehensiveReportController::class, 'index']);
Route::post('/comprehensive_reports/insert', [ComprehensiveReportController::class,  'store']);

//Monthly Report
Route::get('/monthly_details/show', [MonthlyDetailsController::class, 'index']);
Route::post('/monthly_details/insert', [MonthlyDetailsController::class, 'store']);









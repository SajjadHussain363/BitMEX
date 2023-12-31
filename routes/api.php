<?php


use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ComprehensiveReportController;
use App\Http\Controllers\IncreaseDecreaseBalanceController;
use App\Http\Controllers\MonthlyDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RealTimeOverViewController;
use App\Http\Controllers\RechargeRecordController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\WithdrawalDetailsController;
use App\Http\Controllers\WithdrawalRecordController;
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


//Login & Logout
Route::post('/login', [AuthUserController::class, 'login']);
Route::post('/logout', [AuthUserController::class, 'logout']);
Route::post('/refresh', [AuthUserController::class, 'refresh']);

// * important use*
// middleware('jwtAuth')


//User Profile
Route::middleware('jwtAuth')->get('/profile', [AuthUserController::class, 'showProfile']);
Route::middleware('jwtAuth')->post('/profile', [AuthUserController::class, 'updateProfile']);

//User Settings
Route::get('/settings', [AuthUserController::class, 'showSettings']);
Route::put('/settings', [AuthUserController::class, 'updateSettings']);

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


//Withdrawal Record Check Details
Route::post('/withdrawalDetails/store', [WithdrawalDetailsController::class, 'store']);
Route::get('/withdrawalDetails/{store}', [WithdrawalDetailsController::class, 'show']);

//Withdrawal Record
Route::get('/withdrawal/index', [WithdrawalRecordController::class,  'index']);
Route::post('/withdrawal/store', [WithdrawalRecordController::class, 'store']);
Route::get('/withdrawal/{store}', [WithdrawalRecordController::class, 'show']);

//Increase Decrease Balance
Route::get('/increaseDecreaseBalance/index', [IncreaseDecreaseBalanceController::class,  'index']);
Route::post('/increaseDecreaseBalance/store', [IncreaseDecreaseBalanceController::class, 'store']);

//Recharge Record
Route::get('/recharge/index', [RechargeRecordController::class,  'index']);
Route::post('/recharge/store', [RechargeRecordController::class, 'store']);
Route::get('/recharge/{store}', [RechargeRecordController::class, 'show']);

//Orders
Route::get('/orders/index', [OrdersController::class,  'index']);
Route::post('/orders/store', [OrdersController::class, 'store']);
Route::get('/orders/{orders}', [OrdersController::class, 'show']);

//Product
Route::get('/product/index', [ProductController::class,  'index']);
Route::post('/product/store', [ProductController::class, 'store']);

//Realtime Overview
Route::get('/realtime/index', [RealTimeOverViewController::class, 'index']);
Route::post('/realtime/store', [RealTimeOverViewController::class, 'store']);

//Comprehensive Report
Route::get('/comprehensive_reports/index', [ComprehensiveReportController::class, 'index']);
Route::post('/comprehensive_reports/store', [ComprehensiveReportController::class,  'store']);

//Monthly Report
Route::get('/monthly_details/index', [MonthlyDetailsController::class, 'index']);
Route::post('/monthly_details/store', [MonthlyDetailsController::class, 'store']);









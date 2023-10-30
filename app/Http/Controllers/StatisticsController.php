<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StatisticsController extends Controller
{
    
     public function getTotalStats($cardID = null)
    {
        $response = [];
        
        if (is_null($cardID)) {
            // Use hardcoded data or any other data source to calculate statistics
            $response['total_users'] = 100; // Example: 100 users
            $response['total_recharge_amount'] = 5000; // Example: Total recharge amount
            $response['total_loss'] = 1000; // Example: Total loss amount
            $response['total_profit'] = 4000; // Example: Total profit amount
            $response['total_withdrawal_amount'] = 3000; // Example: Total withdrawal amount
            $response['message'] = 'Success: All statistics retrieved.';
        } elseif ($cardID === 'total_user') {
            $response['total_users'] = 100; // Example: Total recharge amount
            $response['message'] = 'Success: Total users retrieved.';
        } elseif ($cardID === 'total_recharge_amount') {
            $response['total_recharge_amount'] = 5000; // Example: Total recharge amount
            $response['message'] = 'Success: Total recharge amount retrieved.';
        } elseif ($cardID === 'loss_amount') {
            $response['total_loss'] = 1000; // Example: Total loss amount
            $response['message'] = 'Success: Total loss amount retrieved.';
        } elseif ($cardID === 'profit_amount') {
            $response['total_profit'] = 4000; // Example: Total profit amount
            $response['message'] = 'Success: Total profit amount retrieved.';
        } elseif ($cardID === 'total_withdrawal_amount') {
            $response['total_withdrawal_amount'] = 3000; // Example: Total withdrawal amount
            $response['message'] = 'Success: Total withdrawal amount retrieved.';
        } else {
            // Handle invalid input and provide an error message
            $response['error'] = 'Invalid input. Please provide a valid cardID or leave it empty for all statistics. Valid options: total_users, total_recharge_amount, total_loss, total_profit, total_withdrawal_amount, total_user';
        }
        
        return response()->json($response);
        
        
        // Later use when use database  
        // if (is_null($cardID)) {
        //     $response['total_users'] = User::count();
        //     $response['total_recharge_amount'] = User::sum('recharge_amount');
        //     $response['total_loss'] = User::sum('loss_amount');
        //     $response['total_profit'] = User::sum('profit_amount');
        //     $response['total_withdrawal_amount'] = User::sum('withdrawal_amount');
        // } elseif ($cardID === 'recharge_amount') {
        //     $response['total_recharge_amount'] = User::sum('recharge_amount');
        // } elseif ($cardID === 'loss_amount') {
        //     $response['total_loss'] = User::sum('loss_amount');
        // } elseif ($cardID === 'profit_amount') {
        //     $response['total_profit'] = User::sum('profit_amount');
        // } elseif ($cardID === 'total_withdrawal_amount') {
        //     $response['total_withdrawal_amount'] = User::sum('withdrawal_amount');
        // }
    
        

    }
   

}
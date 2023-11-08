<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class WithdrawalDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $withdrawal_records = WithdrawalDetails::create([           
            ]);
            if ($withdrawal_records) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Withdrawaled Successfully!!'
                ], 200);
            }
            else
            {
                return response()
                ->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong.'
                ], 500);
            }
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawalDetails  $withdrawalDetails
     * @return \Illuminate\Http\Response
     */
    public function show($orderNum)
    {
        $order = DB::table('withdrawal_details')
        ->join('orders', 'withdrawal_details.id', "=" ,'orders.id')
        ->select('orders.id', 'orders.MemberId', 'orders.username', 'orders.ordertime',
        'orders.productInfo', 'orders.state', 'orders.direction',
        'orders.timePoints', 'orders.positionOpenPoint', 'orders.closingPoint',
        'orders.commissionBalance', 'orders.invalidOrderBalance', 'orders.effectiveOrderBalance',
        'orders.actualProfitAndLoss','orders.balanceAfterPurchase','orders.singleControlOperation',)
        ->where('orders.id', $orderNum)
        ->get();

        if ($order->isEmpty()) {
            return response()->json(['message' => 'No details found']);
        } else {
            return response()->json($order);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawalDetails  $withdrawalDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawalDetails $withdrawalDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawalDetails  $withdrawalDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawalDetails $withdrawalDetails)
    {
        //
    }
}

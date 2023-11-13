<?php

namespace App\Http\Controllers;

use App\Models\RechargeRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class RechargeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = config('constants.paymentMethod', 'constants.state');
        $order = DB::table('recharge_records')
        ->join('orders', 'recharge_records.id', "=" ,'orders.id')
        ->select('orders.id', 'orders.MemberId', 'orders.username', 'recharge_records.rechargeAmount',
        'recharge_records.giftAmount', 'recharge_records.paymentMethod', 
        'recharge_records.state', 'recharge_records.reasonRejection',  'recharge_records.reasonRejection')
        ->get();

        if ($order->isEmpty()) {
            return response()->json(['message' => 'No recharge found']);
        } else {
            return response()->json($order);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'rechargeAmount' => 'required|integer',
            'giftAmount' => 'required|string',
            'paymentMethod' => 'required|string',
            'state' => 'required|string',
            'reasonRejection' => 'required|string',
            
        ]);

        if ($validator->fails()) {
            return response()
            ->json([
                'status' => 422, 
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $recharge_records = RechargeRecord::create([
                'rechargeAmount' => $request->rechargeAmount,
                'giftAmount' => $request->giftAmount,
                'paymentMethod' => $request->paymentMethod,
                'state' => $request->state,
                'reasonRejection' => $request->reasonRejection,
            ]);

            if ($recharge_records) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Recharged Successfully!!'
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
    }


    public function show($orderNum)
    {
        $order = DB::table('recharge_records')
        ->join('orders', 'recharge_records.id', "=" ,'orders.id')
        ->select('orders.id', 'orders.MemberId', 'orders.username', 'recharge_records.rechargeAmount',
        'recharge_records.giftAmount', 'recharge_records.paymentMethod', 
        'recharge_records.state', 'recharge_records.reasonRejection',  'recharge_records.reasonRejection')
        ->where('orders.id', $orderNum)
        ->get();

        if ($order->isEmpty()) {
            return response()->json(['message' => 'No recharge found']);
        } else {
            return response()->json($order);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RechargeRecord  $rechargeRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RechargeRecord $rechargeRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RechargeRecord  $rechargeRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(RechargeRecord $rechargeRecord)
    {
        //
    }
}

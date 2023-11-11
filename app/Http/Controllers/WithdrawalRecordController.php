<?php

namespace App\Http\Controllers;

use App\Models\WithdrawalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\PreventsDuplicateSubmissions;
use Validator;

class WithdrawalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
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

            'serialNum' => 'required|integer',
            'withdrawalAmount' => 'required|integer',
            'handlingFee' => 'required|integer',
            'actualArrival' => 'required|integer',
            'bankDeposit' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'denialReason' => 'required|string',
            'processingProgress' => 'required|string|in:completed,rejected,processing',
            
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
        
            if ($image = $request->file('bankDeposit')) {
                $destinationPath = public_path('BankDeposit/');
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $path = 'BankDeposit/' . $postImage;

                
            }
            
            
            $withdrawal_records = WithdrawalRecord::create([
                'serialNum' => $request->serialNum,
                'withdrawalAmount' => $request->withdrawalAmount,
                'handlingFee' => $request->handlingFee,
                'actualArrival' => $request->actualArrival,
                'bankDeposit' => $path,
                'denialReason' => $request->denialReason,
                'processingProgress' => $request->processingProgress,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WithdrawalRecord  $withdrawalRecord
     * @return \Illuminate\Http\Response
     */
    public function show($orderNum)
    {
        $order = DB::table('withdrawal_records')
        ->join('orders', 'withdrawal_records.id', "=" ,'orders.id')
        ->select('orders.id', 'orders.MemberId', 'orders.username', 'withdrawal_records.serialNum',
        'withdrawal_records.withdrawalAmount', 'withdrawal_records.handlingFee', 'withdrawal_records.actualArrival',
        'withdrawal_records.bankDeposit', 'withdrawal_records.denialReason', 'orders.ordertime',
        'withdrawal_records.processingProgress')
        ->where('orders.id', $orderNum)
        ->get();

        if ($order->isEmpty()) {
            return response()->json(['message' => 'No withdrawal found']);
        } else {
            return response()->json($order);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WithdrawalRecord  $withdrawalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WithdrawalRecord $withdrawalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithdrawalRecord  $withdrawalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithdrawalRecord $withdrawalRecord)
    {
        //
    }
}

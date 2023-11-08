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
        $withdrawal_records = config('constants.processingProgress');
        $withdrawal_records = WithdrawalRecord::all(); 
        if ($withdrawal_records->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'withdrawal_records' => $withdrawal_records
            ], 200);
            
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'withdrawal_records' =>'No Withdrawal Found!'
            ], 404);
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

            'serialNum' => 'required|integer|unique:withdrawal_records',
            'withdrawalAmount' => 'required|integer',
            'handlingFee' => 'required|integer',
            'actualArrival' => 'required|integer',
            'bankDeposit' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'denialReason' => 'required|string',
            'processingProgress' => 'required|string',
            
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
            $withdrawal_records = $request->all();
            if ($image = $request->file('bankDeposit')) {
                $destinationPath = 'BankDeposit/';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $withdrawal_records['bankDeposit'] = $postImage;
            }
            
            $withdrawal_records = WithdrawalRecord::create([
                'serialNum' => $request->serialNum,
                'withdrawalAmount' => $request->withdrawalAmount,
                'handlingFee' => $request->handlingFee,
                'actualArrival' => $request->actualArrival,
                'bankDeposit' => $postImage,
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

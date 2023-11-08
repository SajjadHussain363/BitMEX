<?php

namespace App\Http\Controllers;

use App\Models\IncreaseDecreaseBalance;
use Illuminate\Http\Request;
use Validator;

class IncreaseDecreaseBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $increase_decrease_balances = config('constants.increaseDecreaseType');
        $increase_decrease_balances = IncreaseDecreaseBalance::all(); 
        if ($increase_decrease_balances->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'increase_decrease_balances' => $increase_decrease_balances
            ], 200);
            
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'increase_decrease_balances' =>'No Recharge Found!'
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

            'userAccount' => 'required|string',
            'increaseDecreaseType' => 'required|boolean',
            'increaseDecreaseAmount' => 'required|integer',
            'reasonForModification' => 'required|string',
            
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

            
            $increase_decrease_balances = IncreaseDecreaseBalance::create([
                'userAccount' => $request->userAccount,
                'increaseDecreaseType' => $request->increaseDecreaseType,
                'increaseDecreaseAmount' => $request->increaseDecreaseAmount,
                'reasonForModification' => $request->reasonForModification,
            ]);

            if ($increase_decrease_balances) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Opeartion Done Successfully!!'
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
     * @param  \App\Models\IncreaseDecreaseBalance  $increaseDecreaseBalance
     * @return \Illuminate\Http\Response
     */
    public function show(IncreaseDecreaseBalance $increaseDecreaseBalance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncreaseDecreaseBalance  $increaseDecreaseBalance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncreaseDecreaseBalance $increaseDecreaseBalance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncreaseDecreaseBalance  $increaseDecreaseBalance
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncreaseDecreaseBalance $increaseDecreaseBalance)
    {
        //
    }
}

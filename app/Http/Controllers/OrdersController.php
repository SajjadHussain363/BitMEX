<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::all(); 
        if ($orders->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'orders' => $orders
            ], 200);
            
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'orders' =>'No Orders Found!'
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
            'MemberId' => 'required|integer',
            'username' => 'required|string',
            'productInfo' => 'required|string',
            'state' => 'required|string',
            'direction' => 'required|string',
            'positionOpenPoint' => 'required|integer',
            'closingPoint' => 'required|integer',
            'commissionBalance' => 'required|integer',
            'invalidOrderBalance' => 'required|integer',
            'effectiveOrderBalance' => 'required|integer',
            'actualProfitAndLoss' => 'required|integer',
            'balanceAfterPurchase' => 'required|integer',
            'singleControlOperation' => 'required|string',
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

            $orders = Orders::create([
                'MemberId' => $request->MemberId,
                'username' => $request->username,
                'productInfo' => $request->productInfo,
                'state' => $request->state,
                'direction' => $request->direction,
                'positionOpenPoint' => $request->positionOpenPoint,
                'closingPoint' => $request->closingPoint,
                'commissionBalance' => $request->commissionBalance,
                'invalidOrderBalance' => $request->invalidOrderBalance,
                'effectiveOrderBalance' => $request->effectiveOrderBalance,
                'actualProfitAndLoss' => $request->actualProfitAndLoss,
                'balanceAfterPurchase' => $request->balanceAfterPurchase,
                'singleControlOperation' => $request->singleControlOperation,
            ]);

            if ($orders) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Order Placed Successfully!!'
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
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        return response()->json($orders);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyData;
use Illuminate\Support\Facades\Validator;



class CurrencyDataController  extends Controller
{
   

    public function show($id)
    {
     
        //  $currencyData = CurrencyData::find($id);
        
        $currencyData = CurrencyData::get();
    
         if (!$currencyData) {
             return response()->json(['error' => 'Currency data not found'], 404);
         }
    
         return response()->json([
             'message' => 'Currency data retrieved successfully',
             'data' => $currencyData,
         ]);
     
    }


    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'currency' => 'required',
            'profit_and_loss' => 'required|numeric',
            'date_time' => 'required|date',
            'buy_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }
    
        $data = $request->all();
        $currencyData = CurrencyData::create($data);
    
        
        if ($currencyData) {
            return response()->json(['message' => 'Currency data created', 'id' => $currencyData->id], 201);
        } else {
            return response()->json(['message' => 'Failed to create curreny deta'], 500);
            
        }
        
        
    }

   

}
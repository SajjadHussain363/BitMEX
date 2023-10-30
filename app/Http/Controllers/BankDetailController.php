<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankDetail;
use App\Models\BankDetailLocal;
use Illuminate\Support\Facades\Validator;



class BankDetailController extends Controller
{
   


     public function show($user_id)
    {
        $bankDetail = BankDetailLocal::where('user_id', $user_id)->first();
    
        if (!$bankDetail) {
            return response()->json(['message' => 'Bank detail not found'], 404);
        }
    
        return response()->json([
            'message' => 'Bank detail retrieved successfully',
            'data' => $bankDetail
        ], 200);
    }

    public function store(Request $request)
    {

        // Define the common validation rules for all fields
        $commonValidationRules = [
            'Name' => 'required',
            'BankCardNumber' => 'required',
            'BankName' => 'required',
            'AccountProvince' => 'required',
            'AccountOpeningDate' => 'required',
            'IdentityID' => 'required',
            'InternationalRemittanceCode' => 'required',
            'ContactNumber' => 'required',
            'user_id' =>'required'
        ];
    
     
        // Perform validation
        $validator = Validator::make($request->all(), $commonValidationRules);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }
        
         $user_id = $request->input('user_id');

        // Check if a record with the provided user_id exists
        $existingBankDetail = BankDetail::where('user_id', $user_id)->first();

        if ($existingBankDetail) {
            // Update the existing record
            // $existingBankDetail->update($request->all());
             BankDetail::where('user_id', $request->user_id)->update($request->all());
            return response()->json(['message' => 'Bank detail updated successfully','id' => $existingBankDetail->id], 200);
        } else {
            // Create a new record
            $newBankDetail = BankDetail::create($request->all());
            return response()->json(['message' => 'Bank detail created successfully', 'id' => $newBankDetail->id], 201);
        }
        
        
        return response()->json(['message' => 'Failed to create bank detail'], 500);
        
    }
    
    // show and store local bank details
    
    
    public function showLocal($user_id)
    {
        $bankDetail = BankDetailLocal::where('user_id', $user_id)->first();

    
        if (!$bankDetail) {
            return response()->json(['message' => 'Bank detail not found'], 404);
        }
    
        return response()->json([
            'message' => 'Bank detail retrieved successfully',
            'data' => $bankDetail
        ], 200);
    }
    
    
    public function storeLocal(Request $request)
    {

        // Define the common validation rules for all fields
        $commonValidationRules = [
            'Name' => 'required',
            'BankCardNumber' => 'required',
            'BankName' => 'required',
            'AccountProvince' => 'required',
            'user_id' =>'required'
        ];
    
     
        // Perform validation
        $validator = Validator::make($request->all(), $commonValidationRules);
    
        if ($validator->fails()) {
            return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
        }
        
         $user_id = $request->input('user_id');

        // Check if a record with the provided user_id exists
        $existingBankDetail = BankDetailLocal::where('user_id', $user_id)->first();

        if ($existingBankDetail) {
            // Update the existing record
             BankDetailLocal::where('user_id', $request->user_id)->update($request->all());
            return response()->json(['message' => 'Bank detail updated successfully','id' => $existingBankDetail->id], 200);
        } else {
            // Create a new record
            $newBankDetail = BankDetailLocal::create($request->all());
            return response()->json(['message' => 'Bank detail created successfully', 'id' => $newBankDetail->id], 201);
        }
        
        
        return response()->json(['message' => 'Failed to create bank detail'], 500);
        
    }

   

   

}

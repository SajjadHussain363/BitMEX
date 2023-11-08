<?php

namespace App\Http\Controllers;

use App\Models\RealTimeOverView;
use Illuminate\Http\Request;
use Validator;

class RealTimeOverViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $real_time_over_view = RealTimeOverView::first();
    
        if ($real_time_over_view) {
            return response()->json([
                'status' => 200,
                'real_time_over_view' => $real_time_over_view,
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Overview Not Found!',
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
            'recharge' => 'required|integer',
            'withdraw' => 'required|integer',
            'newToday' => 'required|integer',
            'onlineUsers' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 422, 
                'errors' => $validator->messages()
            ], 422);
        } else {
            $input = $request->all();
            
         
            $existingRecord = RealTimeOverView::where([
                'recharge' => $input['recharge'],
                'withdraw' => $input['withdraw'],
                'newToday' => $input['newToday'],
                'onlineUsers' => $input['onlineUsers'],
            ])->first();
    
            if ($existingRecord) {
         
                $existingRecord->update($input);
    
                return response()->json([
                    'status' => 200,
                    'message' => 'Overview Updated Successfully!!'
                ], 200);
            } else {
         
                RealTimeOverView::create($input);
    
                return response()->json([
                    'status' => 200,
                    'message' => 'Overview Created Successfully!!'
                ], 200);
            }
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealTimeOverView  $realTimeOverView
     * @return \Illuminate\Http\Response
     */
    public function show(RealTimeOverView $realTimeOverView)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealTimeOverView  $realTimeOverView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealTimeOverView $realTimeOverView)
    {
        //
    }

  
    public function destroy(RealTimeOverView $realTimeOverView)
    {
        //
    }
}

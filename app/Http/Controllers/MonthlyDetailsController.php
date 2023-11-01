<?php

namespace App\Http\Controllers;

use App\Models\MonthlyDetails;
use Illuminate\Http\Request;
use Validator;

class MonthlyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $monthly_details = MonthlyDetails::all(); 
        if ($monthly_details->count() > 0) {
            return response()
            ->json([
                'status' => 200,
                'monthly_details' => $monthly_details
            ], 200);
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'monthly_details' =>'No Details Found!'
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
            'employee_name' => 'required',
            'employee_phone' => 'required',
            'total_tasks' => 'required',
            'done_tasks' => 'required',
            'pending_tasks' => 'required',
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
            

            $monthly_details = MonthlyDetails::create([
                'employee_name' => $request->employee_name,
                'employee_phone' => $request->employee_phone,
                'total_tasks' => $request->total_tasks,
                'done_tasks' => $request->done_tasks,
                'pending_tasks' => $request->pending_tasks,
            ]);

            if ($monthly_details) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Details Added Successfully!!'
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
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyDetails $monthlyDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyDetails $monthlyDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyDetails  $monthlyDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyDetails $monthlyDetails)
    {
        //
    }
}

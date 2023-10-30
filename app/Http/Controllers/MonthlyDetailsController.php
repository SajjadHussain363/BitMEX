<?php

namespace App\Http\Controllers;

use App\Models\MonthlyDetails;
use Illuminate\Http\Request;

class MonthlyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'posts' => MonthlyDetails::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new MonthlyDetails;
        $post->employee_name = $request->employee_name;
        $post->employee_phone = $request->employee_phone;
        $post->total_tasks = $request->total_tasks;
        $post->done_tasks = $request->done_tasks;
        $post->pending_tasks = $request->pending_tasks;
        

        $post->save();

        return response()->json([
            'message' => 'Post Created',
            'status' => 'success',
            'data'   => $post
        ]);
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

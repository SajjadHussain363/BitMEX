<?php

namespace App\Http\Controllers;

use App\Models\ComprehensiveReport;
use Illuminate\Http\Request;

class ComprehensiveReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'comprehensive_reports' => ComprehensiveReport::get()
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
        $post = new ComprehensiveReport;
        $post->empName = $request->empName;
        $post->phone = $request->phone;
        $post->address = $request->address;
        

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
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function show(ComprehensiveReport $comprehensiveReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ComprehensiveReport $comprehensiveReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ComprehensiveReport  $comprehensiveReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComprehensiveReport $comprehensiveReport)
    {
        //
    }
}

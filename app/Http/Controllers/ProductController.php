<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $products = Product::all(); 
    
        if ($products->count() > 0) {
            return response()
                ->json([
                    'status' => 200,
                    'products' => $products,
                ], 200);
        } else {
            return response()
                ->json([
                    'status' => 404,
                    'products' => 'No Records Found!',
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
            'name' => 'required|string|min:3|max:25',
            'ProductCode' => 'required|string|unique:products',
            'HomePageRecommendation' => 'required|in:0,1',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'HomePageRecommendation' => 'integer',
            'MinimumRiskControlFluctuation' => 'integer',
            'MaximumRiskControlFluctuation' => 'integer',
            'RandomFluctuationRange' => 'integer',
            'TimePlayIntervalOne' => 'nullable|integer',
            'TimePlayIntervalTwo' =>  'nullable|integer',
            'TimePlayIntervalThree' =>  'nullable|integer',
            'TimePlayIntervalFour' => 'nullable|integer',
            'MinimumLimitAmountOne' => 'nullable|integer',
            'MinimumLimitAmountTwo' =>  'nullable|integer',
            'MinimumLimitAmountThree' => 'nullable|integer',
            'MinimumLimitAmountFour' => 'nullable|integer',
            'ProfitAndLossRatioOne' =>  'nullable|integer',
            'ProfitAndLossRatioTwo' =>  'nullable|integer',
            'ProfitAndLossRatioThree' =>  'nullable|integer',
            'ProfitAndLossRatioFour' =>  'nullable|integer',
            'LossRatioOne' =>  'nullable|integer',
            'LossRatioTwo' =>  'nullable|integer',
            'LossRatioThree' => 'nullable|integer',
            'LossRatioFour' => 'nullable|integer',
            'Earnings_floating_ratio_range' =>  'nullable|integer',
            'Earnings_floating_under_loss' => 'nullable|integer',
            'MarketOpeningTimeMonday' => 'nullable|string',
            'MarketOpeningTimeTuesday' =>  'nullable|string',
            'MarketOpeningTimeWednesday' =>  'nullable|string',
            'MarketOpeningTimeThursday' =>  'nullable|string',
            'MarketOpeningTimeFriday' =>  'nullable|string',
            'MarketOpeningTimeSaturday' => 'nullable|string',
            'MarketOpeningTimeSunday' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 422);
        }

        $path = '';

        if ($image = $request->file('image')) {
            $path = $this->uploadImage($image);
        }

       $data = $request->only([
            'name', 'ProductCode', 'HomePageRecommendation',
            'MinimumRiskControlFluctuation', 'MaximumRiskControlFluctuation', 'RandomFluctuationRange',
            'TimePlayIntervalOne', 'TimePlayIntervalTwo', 'TimePlayIntervalThree', 'TimePlayIntervalFour',
            'MinimumLimitAmountOne', 'MinimumLimitAmountTwo', 'MinimumLimitAmountThree', 'MinimumLimitAmountFour',
            'ProfitAndLossRatioOne', 'ProfitAndLossRatioTwo', 'ProfitAndLossRatioThree', 'ProfitAndLossRatioFour',
            'LossRatioOne', 'LossRatioTwo', 'LossRatioThree', 'LossRatioFour',
            'Earnings_floating_ratio_range', 'Earnings_floating_under_loss',
            'MarketOpeningTimeMonday', 'MarketOpeningTimeTuesday', 'MarketOpeningTimeWednesday',
            'MarketOpeningTimeThursday', 'MarketOpeningTimeFriday', 'MarketOpeningTimeSaturday', 'MarketOpeningTimeSunday'
        ]);


        $data['image'] = $path;

        $product = Product::create($data);

        if ($product) {
            return response()->json(['message' => 'Product Added Successfully!!'], 200);
        }

        return response()->json(['message' => 'Something Went Wrong.'], 500);
    }

   private function uploadImage($image)
  {
    $destinationPath = 'public/products/'; // Adjust the destination folder as needed
    $postImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
    $image->move($destinationPath, $postImage);

    return $destinationPath . $postImage;
  }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
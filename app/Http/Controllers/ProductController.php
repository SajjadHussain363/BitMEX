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
                'products' => $products
            ], 200);
            
        }
        else {
            return response()
            ->json([
                'status' => 404,
                'products' =>'No Product Found!'
            ], 404);
        }

        $products = config('constants.HomePageRecommendation');
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
            'HomePageRecommendation' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'MinimumRiskControlFluctuation' => 'required',
            'MaximumRiskControlFluctuation' => 'required',
            'RandomFluctuationRange' => 'required',
            'TimePlayIntervalOne' => 'required|digits:5',
            'TimePlayIntervalTwo' => 'required|digits:5',
            'TimePlayIntervalThree' => 'required|digits:5',
            'TimePlayIntervalFour' => 'required|digits:5',
            'MinimumLimitAmountOne' => 'required|digits:5',
            'MinimumLimitAmountTwo' => 'required|digits:5',
            'MinimumLimitAmountThree' => 'required|digits:5',
            'MinimumLimitAmountFour' => 'required|digits:5',
            'ProfitAndLossRatioOne' => 'required',
            'ProfitAndLossRatioTwo' => 'required',
            'ProfitAndLossRatioThree' => 'required',
            'ProfitAndLossRatioFour' => 'required',
            'LossRatioOne' => 'required',
            'LossRatioTwo' => 'required',
            'LossRatioThree' => 'required',
            'LossRatioFour' => 'required',
            'ratioRange' => 'required|digits:3',
            'ratioRangeUnderLoss' => 'required|digits:3',
            'MarketOpeningTimeMonday' => 'string',
            'MarketOpeningTimeTuesday' => 'string',
            'MarketOpeningTimeWednesday' => 'string',
            'MarketOpeningTimeThursday' => 'string',
            'MarketOpeningTimeFriday' => 'string',
            'MarketOpeningTimeSaturday' => 'string',
            'MarketOpeningTimeSunday' => 'string',
            'productNotes'=> '',
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

            $input = $request->all();
            if ($image = $request->file('image')) {
                $destinationPath = 'products/';
                $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $postImage);
                $input['image'] = "$postImage";
            }
      
            Product::create($input);

            
            $products = Product::create([
                'name' => $request->name,
                'ProductCode' => $request->ProductCode,
                'image' => $request->image,
                'HomePageRecommendation' => $request->HomePageRecommendation,
                'MinimumRiskControlFluctuation' => $request->MinimumRiskControlFluctuation,
                'MaximumRiskControlFluctuation' => $request->MaximumRiskControlFluctuation,
                'RandomFluctuationRange' => $request->RandomFluctuationRange,
                'TimePlayIntervalOne' => $request->TimePlayIntervalOne,
                'TimePlayIntervalTwo' => $request->TimePlayIntervalTwo,
                'TimePlayIntervalThree' => $request->TimePlayIntervalThree,
                'TimePlayIntervalFour' => $request->TimePlayIntervalFour,
                'MinimumLimitAmountOne' => $request->MinimumLimitAmountOne,
                'MinimumLimitAmountTwo' => $request->MinimumLimitAmountTwo,
                'MinimumLimitAmountThree' => $request->MinimumLimitAmountThree,
                'MinimumLimitAmountFour' => $request->MinimumLimitAmountFour,
                'ProfitAndLossRatioOne' => $request->ProfitAndLossRatioOne,
                'ProfitAndLossRatioTwo' => $request->ProfitAndLossRatioTwo,
                'ProfitAndLossRatioThree' => $request->ProfitAndLossRatioThree,
                'ProfitAndLossRatioFour' => $request->ProfitAndLossRatioFour,
                'LossRatioOne' => $request->LossRatioOne,
                'LossRatioTwo' => $request->LossRatioTwo,
                'LossRatioThree' => $request->LossRatioThree,
                'LossRatioFour' => $request->LossRatioFour,
                'ratioRange' => $request->ratioRange,
                'ratioRangeUnderLoss' => $request->ratioRangeUnderLoss,
                'MarketOpeningTimeMonday' => $request->MarketOpeningTimeMonday,
                'MarketOpeningTimeTuesday' => $request->MarketOpeningTimeTuesday,
                'MarketOpeningTimeWednesday' => $request->MarketOpeningTimeWednesday,
                'MarketOpeningTimeThursday' => $request->MarketOpeningTimeThursday,
                'MarketOpeningTimeFriday' => $request->MarketOpeningTimeFriday,
                'MarketOpeningTimeSaturday' => $request->MarketOpeningTimeSaturday,
                'MarketOpeningTimeSunday' => $request->MarketOpeningTimeSunday,
                'productNotes' => $request->productNotes,
            ]);

            if ($products) {
                return response()
                ->json([
                    'status' => 200,
                    'message' => 'Product Added Successfully!!'
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

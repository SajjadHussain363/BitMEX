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
<<<<<<< HEAD
            ->json([
                'status' => 404,
                'products' =>'No Product Found!'
            ], 404);
=======
                ->json([
                    'status' => 404,
                    'products' => 'No Records Found!',
                ], 404);
>>>>>>> f3ab375258657f637ac34e06098ad84d965f901e
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
<<<<<<< HEAD
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
=======
            'HomePageRecommendation' => 'required|in:0,1',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
>>>>>>> f3ab375258657f637ac34e06098ad84d965f901e
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->messages()], 422);
        }

        $path = '';

<<<<<<< HEAD
            
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
=======
        if ($image = $request->file('image')) {
            $path = $this->uploadImage($image);
>>>>>>> f3ab375258657f637ac34e06098ad84d965f901e
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'ProductCode',
        'HomePageRecommendation',
        'image',
        'MinimumRiskControlFluctuation',
        'MaximumRiskControlFluctuation',
        'RandomFluctuationRange',
        'TimePlayIntervalOne',
        'TimePlayIntervalTwo',
        'TimePlayIntervalThree',
        'TimePlayIntervalFour',
        'MinimumLimitAmountOne',
        'MinimumLimitAmountTwo',
        'MinimumLimitAmountThree',
        'MinimumLimitAmountFour',
        'ProfitAndLossRatioOne',
        'ProfitAndLossRatioTwo',
        'ProfitAndLossRatioThree',
        'ProfitAndLossRatioFour',
        'LossRatioOne',
        'LossRatioTwo',
        'LossRatioThree',
        'LossRatioFour',
<<<<<<< HEAD
        'ratioRange',
        'ratioRangeUnderLoss',
        'productNotes',
=======
        'Earnings_floating_ratio_range',
        'Earnings_floating_under_loss',
>>>>>>> f3ab375258657f637ac34e06098ad84d965f901e
        'MarketOpeningTimeMonday' ,
        'MarketOpeningTimeTuesday',
        'MarketOpeningTimeWednesday',
        'MarketOpeningTimeThursday',
        'MarketOpeningTimeFriday',
        'MarketOpeningTimeSaturday',
        'MarketOpeningTimeSunday'
    ];

}

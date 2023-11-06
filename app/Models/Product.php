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
        'Earnings_floating_ratio_range',
        'Earnings_floating_under_loss',
        'MarketOpeningTimeMonday' ,
        'MarketOpeningTimeTuesday',
        'MarketOpeningTimeWednesday',
        'MarketOpeningTimeThursday',
        'MarketOpeningTimeFriday',
        'MarketOpeningTimeSaturday',
        'MarketOpeningTimeSunday'
    ];

}

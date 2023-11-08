<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ProductCode')->unique();
            $table->boolean('HomePageRecommendation')->nullable();
            $table->string('image')->nullable();
            $table->integer('MinimumRiskControlFluctuation');
            $table->integer('MaximumRiskControlFluctuation');
<<<<<<< HEAD
            $table->integer('RandomFluctuationRange');
            $table->integer('TimePlayIntervalOne');
            $table->integer('TimePlayIntervalTwo');
            $table->integer('TimePlayIntervalThree');
            $table->integer('TimePlayIntervalFour');
            $table->integer('MinimumLimitAmountOne');
            $table->integer('MinimumLimitAmountTwo');
            $table->integer('MinimumLimitAmountThree');
            $table->integer('MinimumLimitAmountFour');
            $table->integer('ProfitAndLossRatioOne');
            $table->integer('ProfitAndLossRatioTwo');
            $table->integer('ProfitAndLossRatioThree');
            $table->integer('ProfitAndLossRatioFour');
            $table->integer('LossRatioOne');
            $table->integer('LossRatioTwo');
            $table->integer('LossRatioThree');
            $table->integer('LossRatioFour');
            $table->integer('ratioRange');
            $table->integer('ratioRangeUnderLoss');
=======
            $table->integer('RandomFluctuationRange')->nullable();
            $table->integer('TimePlayIntervalOne')->nullable();
            $table->integer('TimePlayIntervalTwo')->nullable();
            $table->integer('TimePlayIntervalThree')->nullable();
            $table->integer('TimePlayIntervalFour')->nullable();
            $table->integer('MinimumLimitAmountOne')->nullable();
            $table->integer('MinimumLimitAmountTwo')->nullable();
            $table->integer('MinimumLimitAmountThree')->nullable();
            $table->integer('MinimumLimitAmountFour')->nullable();
            $table->integer('ProfitAndLossRatioOne')->nullable();
            $table->integer('ProfitAndLossRatioTwo')->nullable();
            $table->integer('ProfitAndLossRatioThree')->nullable();
            $table->integer('ProfitAndLossRatioFour')->nullable();
            $table->integer('LossRatioOne')->nullable();
            $table->integer('LossRatioTwo')->nullable();
            $table->integer('LossRatioThree')->nullable();
            $table->integer('LossRatioFour')->nullable();
            $table->integer('Earnings_floating_ratio_range')->nullable();
            $table->integer('Earnings_floating_under_loss')->nullable();
>>>>>>> f3ab375258657f637ac34e06098ad84d965f901e
            $table->string('MarketOpeningTimeMonday')->nullable();
            $table->string('MarketOpeningTimeTuesday')->nullable();
            $table->string('MarketOpeningTimeWednesday')->nullable();
            $table->string('MarketOpeningTimeThursday')->nullable();
            $table->string('MarketOpeningTimeFriday')->nullable();
            $table->string('MarketOpeningTimeSaturday')->nullable();
            $table->string('MarketOpeningTimeSunday')->nullable();
            $table->longText('productNotes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

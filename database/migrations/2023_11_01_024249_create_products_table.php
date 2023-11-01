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
            $table->boolean('HomePageRecommendation');
            // $table->string('image')->nullable();
            $table->decimal('MinimumRiskControlFluctuation');
            $table->decimal('MaximumRiskControlFluctuation');
            $table->decimal('RandomFluctuationRange');
            $table->integer('TimePlayIntervalOne');
            $table->integer('TimePlayIntervalTwo');
            $table->integer('TimePlayIntervalThree');
            $table->integer('TimePlayIntervalFour');
            $table->integer('MinimumLimitAmountOne');
            $table->integer('MinimumLimitAmountTwo');
            $table->integer('MinimumLimitAmountThree');
            $table->integer('MinimumLimitAmountFour');
            $table->decimal('ProfitAndLossRatioOne');
            $table->decimal('ProfitAndLossRatioTwo');
            $table->decimal('ProfitAndLossRatioThree');
            $table->decimal('ProfitAndLossRatioFour');
            $table->decimal('LossRatioOne');
            $table->decimal('LossRatioTwo');
            $table->decimal('LossRatioThree');
            $table->decimal('LossRatioFour');
            // $table->time('MarketOpeningTimeMonday');
            // $table->time('MarketOpeningTimeTuesday');
            // $table->time('MarketOpeningTimeWednesday');
            // $table->time('MarketOpeningTimeThursday');
            // $table->time('MarketOpeningTimeFriday');
            // $table->time('MarketOpeningTimeSaturday');
            // $table->time('MarketOpeningTimeSunday');
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

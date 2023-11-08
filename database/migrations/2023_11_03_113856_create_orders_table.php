<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->integer('orderNum');
            $table->integer('MemberId')->unique();
            $table->string('username');
            $table->timestamp('ordertime')->useCurrent();
            $table->string('productInfo');
            $table->string('state');
            $table->string('direction');
            $table->timestamp('timePoints')->useCurrent();
            $table->integer('positionOpenPoint');
            $table->integer('closingPoint');
            $table->integer('commissionBalance');
            $table->integer('invalidOrderBalance');
            $table->integer('effectiveOrderBalance');
            $table->integer('actualProfitAndLoss');
            $table->integer('balanceAfterPurchase');
            $table->string('singleControlOperation');
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
        Schema::dropIfExists('orders');
    }
}

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
        Schema::create('comprehensive_reports', function (Blueprint $table) {
            $table->id();
            $table->string('remark');
            $table->decimal('deposits', 10, 2);
            $table->decimal('dispensing', 10, 2);
            $table->integer('numffpeople');
            $table->integer('numapeople');
            $table->decimal('profitloss', 10, 2);
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
        Schema::dropIfExists('comprehensive_reports');
    }
};

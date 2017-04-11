<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->float('min_bal');
            $table->float('max_bal');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('percentage');
            $table->float('amount');
            $table->integer('min_trans');
            $table->integer('max_trans');
            $table->integer('usage');
            $table->boolean('is_combo');
            $table->unsignedInteger('items');
            $table->unsignedInteger('users');
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
        Schema::dropIfExists('discounts');
    }
}

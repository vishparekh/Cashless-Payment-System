<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('tran_types');
            $table->integer('user1')->unsigned();
            $table->foreign('user1')->references('id')->on('users');
            $table->integer('user2')->unsigned();
            $table->foreign('user2')->references('id')->on('users');
            $table->integer('amount');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans');
    }
}

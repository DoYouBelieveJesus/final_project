<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopcomments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shoper')->unsigned();
            $table->timestamp('time');
            $table->integer('commenter')->unsigned();
            $table->foreign('shoper')->references('id')->on('shops');
            $table->foreign('commenter')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopcomments');
    }
}

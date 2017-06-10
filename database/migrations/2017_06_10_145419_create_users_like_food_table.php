<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLikeFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserLikeFood', function (Blueprint $table) {           
            $table->integer('user')->unsigned();
            $table->integer('food')->unsigned();
            $table->primary(['user', 'food']);
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('food')->references('id')->on('meals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserLikeFood');
    }
}

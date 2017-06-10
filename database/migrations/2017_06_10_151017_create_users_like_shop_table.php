<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLikeShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('UserLikeShop', function (Blueprint $table) {
            $table->integer('user')->unsigned();
            $table->integer('shop')->unsigned();
            $table->primary(['user', 'shop']);
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('shop')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserLikeShop');
    }
}

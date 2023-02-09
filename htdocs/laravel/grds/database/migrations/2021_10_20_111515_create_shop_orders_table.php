<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('id');
            $table->unsignedBigInteger('user_id');

            //$table->integer('item_id')->unsigned();
            $table->foreignId('item_id')->constrained('shop_products');
            $table->integer('amount')->unsigned();

            $table->text('comment');

            $table->foreign('user_id')->references('id')->on('users');

           // $table->foreign('item_id')->references('id')->on('shop_products');

            $table->boolean('order_is_open')->default(true);

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
        Schema::dropIfExists('shop_orders');
    }
}

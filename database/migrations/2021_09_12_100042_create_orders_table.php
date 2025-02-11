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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->json('products');
            $table->float('subTotal', 8, 2);
            $table->float('shippingFee', 8, 2);
            $table->float('total', 8, 2);
            $table->string('shipping_address');
            $table->string('status')->default('pending');
            $table->string('payment_method')->default('COD');
            $table->string('payment_status')->default('unpaid');
            $table->dateTime('packing_time', 0)->nullable();
            $table->dateTime('delivery_time', 0)->nullable();
            $table->dateTime('arrival_time', 0)->nullable();
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

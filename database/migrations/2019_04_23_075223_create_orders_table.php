<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('city');
            $table->string('zip_code');
            $table->string('state');
            $table->string('country');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('coupon_code');
            $table->string('coupon_amount');
            $table->string('grand_total');
            $table->string('payment_method');
            $table->string('order_status');
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

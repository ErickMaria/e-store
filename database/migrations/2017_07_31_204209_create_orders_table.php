<?php

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
            $table->increments('id');
            $table->string('name');
            $table->decimal('price');
            $table->integer('quantity');
            $table->decimal('total');
            $table->integer('zipcode');
            $table->integer('type_freight');
            $table->decimal('value_freight');
            $table->integer('delivery');
            $table->integer('id_product');
            $table->string('product_imagePath');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->OnDelete('cascade');
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
        Schema::drop('orders');
    }
}

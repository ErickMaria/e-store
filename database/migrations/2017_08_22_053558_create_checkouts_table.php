<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
        $table->string('name');
            $table->decimal('price');
            $table->integer('quantity');
            $table->decimal('total');
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
        Schema::drop('checkouts');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreightsTable extends Migration
{
    public function up()
    {
        Schema::create('freights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('zipcode');
            $table->integer('type_freight');
            $table->decimal('value');
            $table->integer('delivery');
            $table->integer('id_checkout')->unsigned();
            $table->foreign('id_checkout')->references('id')->on('checkouts')->onDelete('cascade');
            $table->timestamps();
        });
    }
  
    public function down()
    {
        Schema::drop('freights');
    }
}

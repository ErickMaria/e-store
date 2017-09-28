<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');   
            $table->string('imagePath');
            $table->float('price');
            $table->integer('quantity');
            $table->decimal('weight');
            $table->decimal('height');
            $table->decimal('width');
            $table->decimal('length');
            $table->decimal('diameter');
            $table->text('description'); 
            $table->integer('id_category')->unsigned();
            $table->foreign('id_category')->references('id')->on('categories');
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::drop('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name',150);
            $table->integer('type_id')->unsigned();
            $table->string('image');
            $table->integer('price');
            $table->integer('sale_price');
            $table->integer('promotion');
            $table->text('description');
            $table->integer('expiry');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('protypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}

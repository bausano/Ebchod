<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->smallInteger('shop');
            $table->string('product_id');
            $table->string('item_group');
            $table->string('product_name');
            $table->string('product_showed_name');
            $table->mediumText('description');
            $table->string('manufacturer', 200);
            $table->string('url', 250);
            $table->decimal('price', 8, 2);
            $table->smallInteger('currency');
            $table->integer('category');
            $table->string('delivery_date', 30);
            $table->boolean('gift');
            $table->tinyInteger('rating');

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
        Schema::drop('products');
    }
}
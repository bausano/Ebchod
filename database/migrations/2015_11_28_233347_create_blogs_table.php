<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 255);
            $table->string('seo', 30);
            $table->integer('user_id');
            $table->string('img');
            $table->string('sections');
            $table->longText('content');
            $table->boolean('display')->default(true);
            $table->integer('views');

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
        Schema::drop('blogs');
    }
}

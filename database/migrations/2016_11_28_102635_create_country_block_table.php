<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryBlockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_block', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cid')->unsigned();
            $table->string('title');
            $table->string('identifier');
            $table->string('url');
            $table->string('boption');
            $table->string('bimg');
            $table->string('bcolor');
            $table->text('content');
            $table->string('featured_image');
            $table->integer('order');
            $table->timestamps();
        });

         Schema::table('country_block', function($table) {
            $table->foreign('cid')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_block');
    }
}

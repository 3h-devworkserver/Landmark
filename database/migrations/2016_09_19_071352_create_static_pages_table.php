<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('position');
            $table->string('url');
            $table->string('static_title');
            $table->string('sub_title');
            $table->string('short_description');
            $table->string('description');
            $table->string('featured_image');
            $table->string('parallax');
            $table->string('boption');
            $table->string('background_color');
            $table->string('background_image');
            $table->timestamps();
        });

        Schema::table('static_pages', function($table) {
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}

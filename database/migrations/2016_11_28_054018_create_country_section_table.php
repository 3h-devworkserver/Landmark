<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountrySectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_section', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->string('url');
            $table->string('featured_image');
            $table->timestamps();
        });
        Schema::table('country_section', function($table) {
            $table->foreign('c_id')->references('id')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_section');
    }
}

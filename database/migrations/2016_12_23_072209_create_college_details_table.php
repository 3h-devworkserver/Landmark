<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_details', function (Blueprint $table) {
            $table->increments('collegeid');
            $table->integer('uni_id');
            $table->integer('course_id');
            $table->integer('slider_id');
            $table->string('college_name');
            $table->text('college_detail');
            $table->text('course_detail');
            $table->string('url');
            $table->string('contact');
            $table->string('images');
            $table->string('location');
            $table->string('slug');
            $table->string('header_image');
            $table->timestamps();
        });

        Schema::table('college_details', function($table) {
            $table->foreign('collegeid')->references('u_id')->on('universities');
        });
        Schema::table('college_details', function($table) {
            $table->foreign('collegeid')->references('id')->on('course_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_details');
    }
}

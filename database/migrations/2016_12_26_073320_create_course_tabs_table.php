<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courseid');
            $table->integer('clzid');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->timestamps();
        });
          Schema::table('course_tabs', function($table) {
            $table->foreign('courseid')->references('id')->on('course_details');
        });
        Schema::table('course_tabs', function($table) {
            $table->foreign('clzid')->references('collegeid')->on('college_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_tabs');
    }
}

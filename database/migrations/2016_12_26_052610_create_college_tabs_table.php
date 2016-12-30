<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeTabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_tabs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clz_id');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::table('college_tabs', function($table) {
            $table->foreign('clz_id')->references('collegeid')->on('college_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('college_tabs');
    }
}

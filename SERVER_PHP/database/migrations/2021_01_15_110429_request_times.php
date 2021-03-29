<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_times', function (Blueprint $table) {

            $table->id();
            $table->timestamp('at_time')->nullable();
            $table->string('router')->nullable();
            $table->string('method')->nullable();
            $table->string('uri')->nullable();
            $table->string('referer')->nullable();
            $table->text('route')->nullable();
            $table->unsignedInteger('request_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_times');
    }
}

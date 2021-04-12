<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_informations', function (Blueprint $table) {

            $table->id();
            
            $table->string('ip');
            $table->text('user_agent')->nullable();
            $table->text('headers')->nullable();
            $table->integer('count')->default(1);
            $table->string('ip_infor')->nullable();
            $table->string('hostname')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('loc')->nullable();
            $table->string('postal')->nullable();
            $table->string('timezone')->nullable();
            $table->unsignedInteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('request_informations');
    }
}

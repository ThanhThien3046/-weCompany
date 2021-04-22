<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branchs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('excerpt')->nullable();
            $table->text('content')->nullable();
            $table->text('catalogue')->nullable();
            $table->string('background', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->string('description', 160)->nullable();
            $table->string('title_recruit', 160)->nullable();
            $table->string('color', 255)->default('#f17067');
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
        Schema::dropIfExists('branchs');
    }
}

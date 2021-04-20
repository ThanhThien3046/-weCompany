<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('recruits')) {
            return true;
        }
        Schema::create('recruits', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->nullable();
            $table->text('content')->nullable();
            $table->unsignedInteger('branch_id')->unsigned();
            $table->boolean('show')->default(false);
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
        Schema::dropIfExists('recruits');
    }
}

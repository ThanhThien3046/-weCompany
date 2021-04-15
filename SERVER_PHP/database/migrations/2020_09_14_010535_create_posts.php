<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosts extends Migration
{
    /**
     * Run the migrations.
     * ALTER TABLE posts ADD COLUMN sort integer default 1;
     * ALTER TABLE posts ADD COLUMN ldjson json;
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('branch_id')->unsigned();
            $table->unsignedInteger('user_id')->unsigned()->nullable();
            $table->string('title', 150)->nullable();
            $table->string('excerpt')->nullable();
            $table->text('catalogue')->nullable();
            $table->text('text_catalogue')->nullable();
            $table->text('content')->nullable();
            $table->text('text_content')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('image_long', 255)->nullable();
            $table->integer('type')->default(1);
            $table->integer('public')->default(1);
            $table->string('description', 160)->nullable();
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
        Schema::dropIfExists('posts');
    }
}

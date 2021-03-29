<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('options')) {
            return true;
        }
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('key', 150);
            $table->integer('type')->default(1);
            $table->text('value_text')->nullable();
            $table->text('value_html')->nullable();
            $table->string('language', 10)->default('vi');
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
        Schema::dropIfExists('options');
    }
}

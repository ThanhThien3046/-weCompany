<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * ALTER TABLE users ADD COLUMN role_id INTEGER default 1;
     * ALTER TABLE users ADD COLUMN contact VARCHAR;
     * ALTER TABLE topics ADD COLUMN user_id INTEGER;
     * ALTER TABLE tags ADD COLUMN user_id INTEGER;
     * ALTER TABLE posts ADD COLUMN user_id INTEGER;
     * UPDATE topics set user_id = 1;
     * UPDATE topics set user_id = 2 where slug = 'marketing';
     * UPDATE tags set user_id = 1;
     * UPDATE posts set user_id = 1;
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email', 250)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar');
            $table->unsignedInteger('role_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

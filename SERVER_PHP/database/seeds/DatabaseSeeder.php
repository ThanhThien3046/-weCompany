<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(users::class);
        $this->call(options::class);
        $this->call(branchs::class);
        $this->call(posts::class);
        $this->call(recruits::class);
    }
}

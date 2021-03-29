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
        $this->call(topics::class);
        $this->call(tags::class);
        $this->call(posts::class);
        $this->call(post_tag_actives::class);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ///user supper admin
        DB::table('users')->insert(
            [
                'name'       => 'Admin',
                'email'      => 'thanhthien3046@gmail.com',
                'avatar'     => '/images/avatar.jpg',
                'password'   => bcrypt('admin123'),
                'role_id'    => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}

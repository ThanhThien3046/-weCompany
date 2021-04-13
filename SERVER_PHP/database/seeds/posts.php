<?php

use App\Helpers\SupportString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                [
                    'branch_id'   => 1,
                    'user_id'     => 1,
                    'title'       => "Bài viết số 1",
                    'excerpt'     => 'excerpt Bài viết số 1',
                    'content'     => 'content Bài viết số 1',
                    'description' => 'description Bài viết số 1',
                    'image'       => '/logo.png',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
                [
                    'branch_id'   => 2,
                    'user_id'     => 1,
                    'title'       => "Bài viết số 2",
                    'excerpt'     => 'excerpt Bài viết số 2',
                    'content'     => 'content Bài viết số 2',
                    'description' => 'description Bài viết số 2',
                    'image'       => '/logo.png',
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}

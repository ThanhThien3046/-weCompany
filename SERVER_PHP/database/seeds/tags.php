<?php

use App\Helpers\SupportString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tags extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nameTags = [
            'Tag test',
            'Tag seed',
            'Random tag',
        ];
        foreach ($nameTags as $tag) {

            DB::table('tags')->insert(
                [
                    'title'        => $tag,
                    'excerpt'     => 'excerpt ' . $tag,
                    'content'     => 'content ' . $tag,
                    'image'       => '/logo.png',
                    'description' => 'description ' . $tag,
                    'created_at'  => date('Y-m-d H:i:s'),
                    'updated_at'  => date('Y-m-d H:i:s')
                ],
            );
        }
    }
}

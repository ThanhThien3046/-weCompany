<?php

use App\Helpers\SupportString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class topics extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert([
            [
                'title'       => 'php core',
                'slug'        => SupportString::createSlug('php core'),
                'excerpt'     => 'excerpt php core',
                'content'     => 'content php core',
                'image'       => '/logo.png',
                'description' => 'description_seo php core',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'kiến thức web',
                'slug'        => SupportString::createSlug('kiến thức web'),
                'excerpt'     => 'excerpt kiến thức website',
                'content'     => 'content kiến thức website',
                'image'       => '/logo.png',
                'description' => 'description_seo kiến thức website',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
        ]);
    }
}

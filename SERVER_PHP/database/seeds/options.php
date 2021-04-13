<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class options extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert(
            [
                [
                    'key'        => "footer-title",
                    'type'       => 1,
                    'value_text' => '',
                    'value_html' => null,
                    'language'   => Config::get('app.locale')
                ],
                [
                    'key'        => "description-footer",
                    'type'       => 1,
                    'value_text' => '',
                    'value_html' => null,
                    'language'   => Config::get('app.locale')
                ]
            ]
        );
    }
}

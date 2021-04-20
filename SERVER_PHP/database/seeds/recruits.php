<?php

use App\Helpers\SupportString;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class recruits extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            # code...
            $isInsert = rand( 1, 2);
            if( $isInsert == 1 ){
                /// insert 
                $recruits = [
                    [
                        'title'   => '営業',
                        'content' => '営業■事務
                        現在は募集をしておりません。
                        現在は募集をしておりません。',
                        'branch_id' => rand( 1, 10),
                        'updated_at' => Carbon::now()->subDays(720)->format('Y-m-d H:i:s'),
                        'created_at' => Carbon::now()->subDays(720)->format('Y-m-d H:i:s'),
                    ],
                    [
                        'title'   => '営業',
                        'content' => '営業■事務
                        現在は募集をしておりません。
                        現在は募集をしておりません。',
                        'branch_id' => rand( 1, 10),
                        'updated_at' => Carbon::now()->subDays(360)->format('Y-m-d H:i:s'),
                        'created_at' => Carbon::now()->subDays(360)->format('Y-m-d H:i:s'),
                    ],
                ];
                if($i % 2){
                    $recruits[3] = [
                        'title'   => '営業',
                        'content' => '営業■事務
                        現在は募集をしておりません。',
                        'branch_id' => rand( 1, 10),
                        'updated_at' => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
                        'created_at' => Carbon::now()->subDays(30)->format('Y-m-d H:i:s'),
                    ];
                }
                $recruits = array_reverse($recruits);
                DB::table('recruits')->insert($recruits);
            }
        }
    }
}


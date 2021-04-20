<?php

use App\Helpers\SupportString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class branchs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branchs = [
            [
        
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/wehomes.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
            [
                
                'title'   => 'we werentcar',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/werentcar.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
            [
                
                'title'   => 'we wefarm',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/wefarm.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
            [
                
                'title'   => 'we wea',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/wea.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
        
            [
                
                'title'   => 'we weB',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/weB.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
        
            [
                
                'title'   => 'we weconsulting',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/weconsulting.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
            
            [
                
                'title'   => 'we wejob',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/wejob.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
        
            [
                
                'title'   => 'we weparlor',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/weparlor.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
        
            [
                
                'title'   => 'we weD',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/weD.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ],
        
        
            [
                'title'   => 'we wemusic',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/wemusic.png',
                'title_recruit' => '株式会社WE・HOMES【求人】',
            ]
        ];
        DB::table('branchs')->insert($branchs);
    }
}
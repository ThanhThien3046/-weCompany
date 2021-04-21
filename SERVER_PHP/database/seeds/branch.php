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
        
                'title'   => 'we homes 1',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we land',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we land 2',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we land 3',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we land 4',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we land 5',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes 6',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes 6 r ',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes 444 ',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                'title'   => 'we homes 234 ',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ]
        ];
        DB::table('branchs')->insert($branchs);
    }
}
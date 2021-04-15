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
                'excerpt' => 'excerpt trong phần quản trị admin vào đó tìm mà sửa',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ],
        
        
            [
                'title'   => 'we homes',
                'banner'  => '/images/homes_banner.jpg',
                'excerpt' => '',
                'image'   => '/images/banner_02.jpg',
                
            ]
        ];
        DB::table('branchs')->insert($branchs);
    }
}
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
        $posts = [
            [
        
                'image'       => '/images/home/asian07.jpg',
                'image_long'  => '/images/home/asian07.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "江戸時代の教科書を見てみよう！",
                'excerpt'     => 'excerpt 江戸時代の教科書を見てみよう！',
                'content'     => 'content 江戸時代の教科書を見てみよう！',
                'description' => 'description 江戸時代の教科書を見てみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian05.png',
                'image_long'  => '/images/home/asian05.png',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "神社にある10個のハートを見つけよう！",
                'excerpt'     => 'excerpt 神社にある10個のハートを見つけよう！',
                'content'     => 'content 神社にある10個のハートを見つけよう！',
                'description' => 'description 神社にある10個のハートを見つけよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian03.jpg',
                'image_long'  => '/images/home/asian03.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian04.jpeg',
                'image_long'  => '/images/home/asian04.jpeg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "600種類の凧からお気に入りを見つけよう！",
                'excerpt'     => 'excerpt 600種類の凧からお気に入りを見つけよう！',
                'content'     => 'content 600種類の凧からお気に入りを見つけよう！',
                'description' => 'description 600種類の凧からお気に入りを見つけよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian02.jpg',
                'image_long'  => '/images/home/asian02.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "600種類の江戸時代の教科書を見てみよう！",
                'excerpt'     => 'excerpt 600種類の江戸時代の教科書を見てみよう！',
                'content'     => 'content 600種類の江戸時代の教科書を見てみよう！',
                'description' => 'description 600種類の江戸時代の教科書を見てみよう！',
                'type'        => 2,
                
            ],
            [
                
                'image'       => '/images/home/asian01.jpg',
                'image_long'  => '/images/home/asian01.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "江戸時代の教科書を見てみよう！",
                'excerpt'     => 'excerpt 江戸時代の教科書を見てみよう！',
                'content'     => 'content 江戸時代の教科書を見てみよう！',
                'description' => 'description 江戸時代の教科書を見てみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian09.jpg',
                'image_long'  => '/images/home/asian09.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "神社にある10vvvvvvvを見つけよう！",
                'excerpt'     => 'excerpt 神社にある10vvvvvvvを見つけよう！',
                'content'     => 'content 神社にある10vvvvvvvを見つけよう！',
                'description' => 'description 神社にある10vvvvvvvを見つけよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian10.jpg',
                'image_long'  => '/images/home/asian10.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            
            [
                
                'image'       => '/images/home/asian11.jpg',
                'image_long'  => '/images/home/asian11.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian12.jpg',
                'image_long'  => '/images/home/asian12.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian13.jpg',
                'image_long'  => '/images/home/asian13.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian19.jpg',
                'image_long'  => '/images/home/asian19.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "f日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt f日本茶の基礎を学んでみよう！',
                'content'     => 'content f日本茶の基礎を学んでみよう！',
                'description' => 'description f日本茶の基礎を学んでみよう！',
                'type'        => 3,
                
            ],
            [
                
                'image'       => '/images/home/asian14.jpg',
                'image_long'  => '/images/home/asian14.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian16.jpg',
                'image_long'  => '/images/home/asian16.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian17.jpeg',
                'image_long'  => '/images/home/asian17.jpeg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian18.jpg',
                'image_long'  => '/images/home/asian18.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => rand( 1, 10),
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian15.jpg',
                'image_long'  => '/images/home/asian15.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => 1,
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian20.jpg',
                'image_long'  => '/images/home/asian20.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => 1,
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
            [
                
                'image'       => '/images/home/asian21.jpg',
                'image_long'  => '/images/home/asian21.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
                'branch_id'   => 1,
                'user_id'     => 1,
                'title'       => "日本茶の基礎を学んでみよう！",
                'excerpt'     => 'excerpt 日本茶の基礎を学んでみよう！',
                'content'     => 'content 日本茶の基礎を学んでみよう！',
                'description' => 'description 日本茶の基礎を学んでみよう！',
                'type'        => 1,
                
            ],
        ];
        $posts = array_reverse($posts);
        DB::table('posts')->insert($posts);
    }
}


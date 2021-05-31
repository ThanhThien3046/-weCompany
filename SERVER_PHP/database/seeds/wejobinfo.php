<?php

use App\Helpers\SupportString;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class wejobinfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wejobinfo = [
            [
        
                'job_content'   => 'レンタカー運用サポート',
                'branch_id'  => 3
            ],
        
            [
                'job_content'   => 'レンタバイク運用サポート',
                'branch_id'  => 3
            ],
        
            [
                
                'job_content'   => '古物の販売業務全各号に付帯する一切の業務',
                'branch_id'  => 3
            ],
        
            [
                
                'job_content'   => 'Group全体の運用サポート',
                'branch_id'  => 2
            ],
        
        
            [
                
                'job_content'   => '労働者派遣',
                'branch_id'  => 2
            ],
        
        
            [
                
                'job_content'   => 'システムエンジニアリングサービス',
                'branch_id'  => 2
            ],
        
            [
                
                'job_content'   => '総合コンサルティング業務',
                'branch_id'  => 2
            ],

            [
                
                'job_content'   => '経営コンサルティング',
                'branch_id'  => 2
            ],

            [
                
                'job_content'   => '総合マーケティイング',
                'branch_id'  => 2
            ],

            [
                
                'job_content'   => '古物の販売業務全各号に付帯する一切の業務',
                'branch_id'  => 2
            ],
            
            [
                
                'job_content'   => 'Group全体の運用サポート',
                'branch_id'  => 1
            ],
        
        
            [
                
                'job_content'   => '労働者派遣',
                'branch_id'  => 1
            ],
        
        
            [
                
                'job_content'   => 'システムエンジニアリングサービス',
                'branch_id'  => 1
            ],

            [
                
                'job_content'   => '総合コンサルティング業務',
                'branch_id'  => 1
            ],

            [
                
                'job_content'   => '経営コンサルティング',
                'branch_id'  => 1
            ],

            [
                
                'job_content'   => '総合マーケティイング',
                'branch_id'  => 1
            ],

            [
                
                'job_content'   => '古物の販売業務全各号に付帯する一切の業務',
                'branch_id'  => 1
            ]
        ];
        DB::table('wejobinfo')->insert($wejobinfo);
    }
}
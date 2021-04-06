<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

    }

    protected function checkSlugExist( $slug = '' ){

        $exist = false;
        
        $exist = (new Post())->where('slug', $slug )->first();
        
        if( !$exist ){
            
            $exist = (new Topic())->where('slug', $slug )->first();
        }
        if( !$exist ){
            
            $exist = (new Tag())->where('slug', $slug )->first();
        }
        return $exist;
    }


    public function slug($slug = null ){

        $exist = $this->checkSlugExist( $slug );
        
        $status = 404;
        $data = array(
            'message'   => 'chưa tồn tại slug: ' . $slug,
            'internal'  => 'chưa tồn tại slug'
        );
        if( $exist ){
            $status = 200;
            $data = array(
                'message'   => 'exist slug: ' . $slug,
                'internal'  => 'exist slug'
            );
        }
        return response()->json($data, $status);
    }
}

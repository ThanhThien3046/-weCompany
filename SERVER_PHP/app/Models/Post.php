<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'id', 
        'user_id', 
        'branch_id', 
        'title', 
        'excerpt', 
        'content', 
        'image_content',
        'public',
        'image', 
        'image_long', 
        'description', 
        'type',
    ];

    protected $casts = [
        'ldjson' => 'array'
    ];

    public function getType(){

        if( $this->type && $this->type == Config::get('constant.TYPE-POST.DEFAULT') ){
            return 'post default';
        }
        return 'post long';
    }

    public function getTitle( $limit = 10, $ellipsis = '...' ){

        if( $this->title ){
            return SupportString::limitText( $this->title, $limit, $ellipsis );
        }
        return null;
    }

    public function getDescriptionSeo( $limit = 10, $ellipsis = '...' ){

        if( $this->description ){
            return SupportString::limitText( $this->description, $limit, $ellipsis );
        }
        return null;
    }

    // public static function boot(){
        
    //     parent::boot();

    //     static::updating(function ($instance) {
    //         // update cache content
    //         $keys = [ static::class , $instance->slug ];
    //         Cache::put(implode(".", $keys ),$instance);
    //     });

    //     static::deleting(function ($instance) {
    //         // delete post cache
    //         $keys = [ static::class , $instance->slug ];
    //         Cache::forget(implode(".", $keys ));
    //     });
    // }

    /**
     * là mối quan hệ dạng nhiều tới 1 ví dụ : 
     */
    public function branch(){
        /// cái thể hiện của object post sẽ có thể gọi hàm này
        /// khi gọi hàm này thì nó tạo ra 1 câu sql tụa tụa như sau (giả sử object trên có id = 4)
        /// select * from posts join branchs on (posts.branch_id = branchs.id) where posts.id = 4
        return $this->belongsTo( Branch::class, 'branch_id');
    }


    public function getPostByCondition( $condition ){

        $mainTable = 'posts';
        $filter = $this ->join('topics', 'posts.topic_id', "=", "topics.id")
                        ->select(["$mainTable.*", 'topics.title as topic_title']);
        if( isset($condition['ignore']) ){

            $filter = $filter->whereNotIn("$mainTable.id", $condition['ignore'] );
        }
        if( isset($condition['public']) ){

            $filter = $filter->where("$mainTable.public", $condition['public']);
        }
        if( isset($condition['user_id']) ){

            $filter = $filter->where("$mainTable.user_id", $condition['user_id']);
        }
        
        if( isset($condition['topic_id']) ){

            $filter = $filter->where('topic_id', $condition['topic_id'])
                                ->orderBy("topic_id", "DESC")
                                ->orderBy("sort", "DESC");
        }
        if( isset($condition['orderby']) ){
            
            $filter = $filter->orderBy($mainTable . "." . $condition['orderby']['field'], $condition['orderby']['type']);
        }
        if( isset($condition['post']) ){

            $filter = $filter->where(function($query) use ($condition){
                
                $slugOrId = $condition['post'];

                $query->where("posts.slug", 'ILIKE', "%$slugOrId%");
                $query->orWhere("posts.id", intval($slugOrId));
            });
        }
        if( isset($condition['topic']) ){

            $filter = $filter->where('topics.id', intval($condition['topic']));
        }

        return $filter;
    }

    public function getPostActiveByCondition(){

        return $this->where('public', Config::get('constant.TYPE_SAVE.PUBLIC'));
    }

}

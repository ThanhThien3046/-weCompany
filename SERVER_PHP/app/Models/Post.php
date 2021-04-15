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
            return 'bình thường';
        }else if( $this->type && $this->type == Config::get('constant.TYPE-POST.RIGHT') ){
            return 'bên phải';
        }
        return 'bên trái';
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
     * là mối quan hệ dạng nhiều nhiều ví dụ : 
     * product -> activity -> style thì thứ tự sẽ là như dưới
     */
    public function tags(){

        return $this->belongsToMany( Tag::class, 'post_tag_actives', 'post_id', 'tag_id');
    }

    public function rateAuthor(){

        return $this->belongsTo( Rating::class, 'rating_id');
    }

    /**
     * là mối quan hệ dạng nhiều tới 1 ví dụ : 
     */
    public function branch(){

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


    public function getPostRelationPostId( $ids ){

        return $this
        ->join('post_tag_actives as pta1', 'posts.id', '=', 'pta1.post_id')
        ->join('post_tag_actives as pta2', 'pta1.tag_id', '=', 'pta2.tag_id')
        ->whereIn('pta2.post_id', $ids )
        ->whereNotIn('posts.id', $ids )
        ->groupby('posts.id')
        ->where('posts.public', 1)
        ->orderBy('posts.view', 'DESC')
        ->select("posts.*");
    }
}

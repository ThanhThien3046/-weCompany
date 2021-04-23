<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class Recruit extends Model
{
    protected $table = 'recruit';

    protected $fillable = [
        'recruit_id', 
        'recruit_num', 
        'title', 
        'content',
        'public',
        'branch_id'
    ];

    protected $casts = [
        'ldjson' => 'array'
    ];

    public function getTitle( $limit = 10, $ellipsis = '...' ){

        if( $this->title ){
            return SupportString::limitText( $this->title, $limit, $ellipsis );
        }
        return null;
    }

    // public function tags(){

    //     return $this->belongsToMany( Tag::class, 'post_tag_actives', 'post_id', 'tag_id');
    // }

    // public function rateAuthor(){

    //     return $this->belongsTo( Rating::class, 'rating_id');
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


    public function getRecruitByCondition( $condition ){

        $mainTable = 'recruit';
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


    public function getRecruitRelationRecruitId( $ids ){

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

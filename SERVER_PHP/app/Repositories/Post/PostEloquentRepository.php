<?php
namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Post::class;
    }

    public function getPostById( $id, $select = array() ){

        $filter = $this->_model;

        if(!empty($select)){
            $filter = $filter->select($select);
        }
        
        $filter = $filter->where('id', $id )->first();
        return $filter;
    }

    public function getPostBySlug( $slug ){
        
        return $this->_model->where('slug', $slug )->select([
            DB::raw("ldjson->>'showto' as showto"),
            DB::raw("ldjson->>'howto' as howto"),
            '*'
        ])->first();
    }

    public function getPostByCondition( $condition ){

        $mainTable = 'posts';
        $filter = $this->_model ->join('topics', 'posts.topic_id', "=", "topics.id")
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

        return $this->_model->where('public', Config::get('constant.TYPE_SAVE.PUBLIC'));
    }


    public function getPostRelationPostId( $ids ){

        return $this->_model
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
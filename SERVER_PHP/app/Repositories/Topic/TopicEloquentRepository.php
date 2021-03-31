<?php
namespace App\Repositories\Topic;

use App\Repositories\EloquentRepository;

class TopicEloquentRepository extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Topic::class;
    }

    
    public function getTopicByCondition( $condition ){

        $filter = $this->_model;
        if( isset($condition['ignore']) ){
            $filter = $filter->whereNotIn('id', $condition['ignore'] );
        }
        if( isset($condition['orderby']) ){

            $filter = $filter->orderBy($condition['orderby']['field'], $condition['orderby']['type']);
        }
        if(isset($condition['user_id'])){

            $filter = $filter->where('user_id', $condition['user_id']);
        }

        return $filter;
    }  
}
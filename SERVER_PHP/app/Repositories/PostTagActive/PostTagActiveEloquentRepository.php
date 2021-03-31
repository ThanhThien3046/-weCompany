<?php
namespace App\Repositories\PostTagActive;

use App\Repositories\EloquentRepository;

class PostTagActiveEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\PostTagActive::class;
    }

    public function removeByPostId( $id ){
        if( !$id ){
            return false;
        }
        return $this->_model->where('post_id', $id)->delete();
    }
    
    public function getByPost( $postId = 0 ){

        return $this->_model->where('post_id', $postId)->pluck('tag_id');
    }
}
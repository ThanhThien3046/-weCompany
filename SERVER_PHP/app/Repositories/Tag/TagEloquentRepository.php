<?php
namespace App\Repositories\Tag;

use App\Repositories\EloquentRepository;

class TagEloquentRepository extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Tag::class;
    }

}
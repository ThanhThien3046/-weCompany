<?php
namespace App\Repositories\Rating;

use App\Repositories\EloquentRepository;

class RatingEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Rating::class;
    }
    
}
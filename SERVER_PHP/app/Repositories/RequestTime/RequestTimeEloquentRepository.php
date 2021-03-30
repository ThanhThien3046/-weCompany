<?php
namespace App\Repositories\RequestTime;

use App\Repositories\EloquentRepository;

class RequestTimeEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\RequestTime::class;
    }
    
    public function firstByRequestId($id){

        $filter = $this->_model;
        $filter = $filter->where('request_id', $id);
        return $filter->first();
    }
}
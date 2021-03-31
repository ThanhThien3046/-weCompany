<?php
namespace App\Repositories\Option;

use App\Repositories\EloquentRepository;

class OptionEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Option::class;
    }
    
    public function findOptionKey( $key ){

        return $this->_model->where('key', trim($key))->first();
    }
}
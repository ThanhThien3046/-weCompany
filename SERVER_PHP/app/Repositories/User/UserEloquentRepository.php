<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }


    
    public function getUserByEmail( $email ){
        
        return $this->_model->where('email', $email )->first();
    }
    
}
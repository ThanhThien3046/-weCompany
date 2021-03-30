<?php
namespace App\Repositories\Iplogin;

use App\Repositories\EloquentRepository;
use Carbon\Carbon;

class IploginEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Iplogin::class;
    }
    
    public function firstIploginByIp($ip){
        $filter = $this->_model;

        $filter = $filter->where('ip', $ip )->first();
        return $filter;
    }

    public function updateIploginByIp($ip, $type = 0){
        /// nếu type = 0 => update block vê 0
        /// ngược lại block += 1
        $filter = $this->_model;

        $filter = $filter->where('ip', $ip )->first();
        if($type){
            /// update += 1
            $filter->block += 1; 
        }else{
            $filter->block = 0;
        }
        $filter->save();
        return true;
    }

    public function updateMailNowIploginByIp($ip ){

        $filter = $this->_model;

        $filter = $filter->where('ip', $ip )->first();
        $filter->mail = Carbon::now();
        $filter->save();
        return true;
    }
}
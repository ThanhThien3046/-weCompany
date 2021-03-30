<?php
namespace App\Repositories\RequestInformation;

use App\Repositories\EloquentRepository;

class RequestInformationEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\RequestInformation::class;
    }
    
    
    /**
     * getRequestInformation
     *
     * @param  mixed $condition dạng  'where' => [ 'id', $ipClient],
     * @return collection or null
     */
    public function getRequestInformation( $condition = array()){

        if(empty($condition)){
            return null;
        }
        $filter = $this->_model;
        foreach($condition as $key => $value ){
            if( is_array($value) ){

                if(count($value) == 2){
                    $filter = $filter->$key($value[0], $value[1]);
                }else if(count($value) == 3){
                    $filter = $filter->$key($value[0], $value[1], $value[2] );
                }
            }
        }
        return $filter->first();
    }

    public function getRequestInformationByCondition( $condition ){
        // $tableName = $this->_model->getTable();

        $filter = $this->_model;
        
        if( isset($condition['orderby']) ){

            $field  = $condition['orderby']['field'];
            $type   = $condition['orderby']['type'];

            $filter = $filter->orderBy($field, $type);
        }

        if( isset($condition['where']) ){

            $filter = $filter->where($condition['where'][0], $condition['where'][1]);
        }

        return $filter;
    }
}
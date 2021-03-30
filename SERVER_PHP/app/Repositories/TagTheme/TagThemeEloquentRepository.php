<?php
namespace App\Repositories\TagTheme;

use App\Repositories\EloquentRepository;

class TagThemeEloquentRepository extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\TagTheme::class;
    }

    public function getTagThemeByCondition( $condition ){

        $mainTable = $this->_model->getTable();

        $filter = $this->_model;


        if( isset($condition['orderby']) ){
            
            $filter = $filter->orderBy(
                $mainTable . "." . $condition['orderby']['field'], 
                $condition['orderby']['type']
            );
        }
        
        return $filter;
    }
}
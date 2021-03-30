<?php
namespace App\Repositories\Theme;

use App\Repositories\EloquentRepository;

class ThemeEloquentRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Theme::class;
    }

    public function getThemeById( $id, $select = array() ){

        $filter = $this->_model;

        if(!empty($select)){
            $filter = $filter->select($select);
        }
        
        $filter = $filter->where('id', $id )->first();
        return $filter;
    }

    public function getThemeByCondition( $condition ){

        $mainTable = $this->_model->getTable();

        $filter = $this->_model ->leftjoin('tag_theme_actives', "$mainTable.id", "=", 'tag_theme_actives.theme_id')
                                ->select(["$mainTable.*", "$mainTable.title as theme_title"]);
        if( isset($condition['ignore']) ){

            $filter = $filter->whereNotIn("$mainTable.id", $condition['ignore'] );
        }
        
        if( isset($condition['theme_id']) ){

            $filter = $filter->where('theme_id', $condition['theme_id'])
                                ->orderBy("theme_id", "DESC");
        }
        if( isset($condition['orderby']) ){
            
            $filter = $filter->orderBy(
                $mainTable . "." . $condition['orderby']['field'], 
                $condition['orderby']['type']
            );
        }
        if( isset($condition['theme']) ){

            $filter = $filter->where(function($query) use ($condition, $mainTable){
                
                $slugOrId = $condition['theme'];

                $query->where("$mainTable.slug", 'ILIKE', "%$slugOrId%");
                $query->orWhere("$mainTable.id", intval($slugOrId));
            });
        }
        if( isset($condition['tag_theme']) ){

            $filter = $filter->where(
                'tag_theme_actives.tag_theme_id', 
                intval($condition['tag_theme'])
            );
        }
        // return $filter;
        return $filter->distinct();
    }
}
<?php
namespace App\Repositories\TagThemeActive;

use App\Repositories\EloquentRepository;

class TagThemeActiveEloquentRepository extends EloquentRepository 
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Models\TagThemeActive::class;
    }

    public function removeByThemeId( $id ){
        if( !$id ){
            return false;
        }
        return $this->_model->where('theme_id', $id)->delete();
    }
    
    public function getByTheme( $themeId = 0 ){

        return $this->_model->where('theme_id', $themeId)->pluck('tag_theme_id');
    }
}
<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['id', 'title', 'slug', 'excerpt', 
    'content', 'background', 'thumbnail', 'site_name',
    'image', 'description'];


    public function getTitle( $limit = 10, $ellipsis = '...' ){

        if( $this->title ){
            return SupportString::limitText( $this->title, $limit, $ellipsis );
        }
        return null;
    }

    public function getDescriptionSeo( $limit = 10, $ellipsis = '...' ){

        if( $this->description ){
            return SupportString::limitText( $this->description, $limit, $ellipsis );
        }
        return null;
    }


    
    /**
     * là mối quan hệ dạng nhiều nhiều ví dụ : 
     * product -> activity -> style thì thứ tự sẽ là như dưới
     */
    public function posts(){

        return $this->belongsToMany( Post::class, 'post_tag_actives', 'tag_id', 'post_id');
    }
}

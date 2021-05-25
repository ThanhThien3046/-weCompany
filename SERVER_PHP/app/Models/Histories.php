<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;

class Histories extends Model
{
    protected $table = 'histories';

    protected $fillable = ['id', 'content', 'branch_id', 'create_at', 'update_at'];

    /**
     * là mối quan hệ dạng 1 nhiều ví dụ : 
     * product -> activity -> style thì thứ tự sẽ là như dưới
     */
    // public function posts(){

    //     return $this->hasMany( Post::class, 'branch_id');
    // }

    // public function getTitle( $limit = 10, $ellipsis = '...' ){

    //     if( $this->title ){
    //         return SupportString::limitText( $this->title, $limit, $ellipsis );
    //     }
    //     return null;
    // }

    // public function getDescriptionSeo( $limit = 10, $ellipsis = '...' ){

    //     if( $this->description ){
    //         return SupportString::limitText( $this->description, $limit, $ellipsis );
    //     }
    //     return null;
    // }
}

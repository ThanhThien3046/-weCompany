<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = ['id', 'key', 'value', 'language' ];

    public function convertSlugKey(){

        if( $this->key ){
            return SupportString::createSlug( $this->key );
        }
        return null;
    }
}

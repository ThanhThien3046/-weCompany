<?php 
namespace App\Helpers;

use App\Models\Option;
use Illuminate\Support\Facades\Config;

class SupportDB{

    public static $OPTIONS = null;

    public static function getOption( $key ){

        if( !static::$OPTIONS ){

            $optionModel = new Option();
            $options     = $optionModel->all();

            $DF_OP = [];
            foreach( $options as $option ){

                $DF_OP[] = [ 
                    'key'        => SupportString::createSlug($option->key),
                    'type'       => $option->type,
                    'value_text' => $option->value_text,
                    'value_html' => $option->value_html,
                ];
            }
            static::$OPTIONS = $DF_OP;
        }

        
        if( static::$OPTIONS ){
            for ($index=0; $index < count(static::$OPTIONS); $index++) { 

                $DF_OPTION_ROW = static::$OPTIONS[$index];
                if( 
                    isset($DF_OPTION_ROW['key']) && 
                    $DF_OPTION_ROW['key'] == SupportString::createSlug($key) 
                    ){

                    if( $DF_OPTION_ROW['type'] == Config::get('constant.TYPE_OPTION.SINGLE')){
                        return $DF_OPTION_ROW['value_text'];
                    }
                    return $DF_OPTION_ROW['value_html'];
                }
            } 
        }
        
        return $key;
    }

}
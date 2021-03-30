<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class SupportRouter{
    
    /**
     * isRouterActive check router active
     *
     * @param  string $_routeName is route name
     * @param  array $_params array example [ 'slug' => 'abc' ]
     * @return boolean
     */
    public static function isRouterActive( $_routeName = '', ...$params ){
        
        $routeCurrent = Route::current();

        $routeName   = $routeCurrent->getName();
        $routeParams = $routeCurrent->parameters();

        if( $routeName != $_routeName ){

            return false;
        }
        if(!empty($params)){

            foreach($params as $param ){

                if(empty($param)){
    
                    return false;
                }
                $attribute = array_keys($param)[0];
                $value     = $param[$attribute];
    
                if( !isset($routeParams[$attribute]) || $routeParams[$attribute] != $value ){
                    return false;
                }
            }
        }
        
        return true;
    }
    
    /**
     * fillClassActive get class router active
     *
     * @param  string $_fill is class output
     * @param  string $_routeName is route name
     * @param  array $_params array example [ 'slug' => 'abc' ]
     * @return $_fill
     */
    public static function fillClassActive( $_fill = "active", $_routeName = '', ...$_params ){

        return self::isRouterActive($_routeName, ...$_params) ? 
        $_fill :
        "";
    }

}
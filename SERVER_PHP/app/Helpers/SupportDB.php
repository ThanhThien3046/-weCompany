<?php 
namespace App\Helpers;

use App\Factory\BaseModel;
use App\Repositories\Option\OptionEloquentRepository;
use App\Repositories\Post\PostEloquentRepository;
use App\Repositories\Tag\TagEloquentRepository;
use App\Repositories\Topic\TopicEloquentRepository;
use Illuminate\Support\Facades\Config;

class SupportDB{

    public static $OPTIONS = null;

    public static function getOption( $key ){

        if( !static::$OPTIONS ){

            $optionModel = new OptionEloquentRepository();
            $options     = $optionModel->getAll();

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

    // public static function getTopicByCondition($condition){

    //     $topicModel = new TopicEloquentRepository();
    //     return $topicModel->getTopicByCondition($condition);
    // }
    // public static function getTagByCondition($condition){
        
    //     $tagModel = new TagEloquentRepository();
    //     return $tagModel->getTagByCondition($condition);
    // }

    // public static function getPostByCondition($condition){

    //     $postModel = new PostEloquentRepository();
    //     return $postModel->getPostByCondition($condition);
    // }
    // public static function getMenuFullService(){

    //     $menuFull = [];

    //     $condition = [
    //         'orderby' => [ 'field' => 'view', 'type' => 'DESC' ]
    //     ];
    //     $topic = static::getTopicByCondition($condition)->first();
    //     $menuFull[] = (object) [
    //         'text' => $topic->title,
    //         'slug' => $topic->slug,
    //         'route' => 'TOPIC_VIEW'
    //     ];
    //     $tag = static::getTagByCondition($condition)->first();
    //     $menuFull[] = (object) [
    //         'text' => $tag->title,
    //         'slug' => $tag->slug,
    //         'route' => 'TAG_VIEW'
    //     ];
    //     $posts = static::getPostByCondition($condition)->take(4)->get();
    //     foreach ($posts as $post) {
    //         $menuFull[] = (object) [
    //             'text' => $post->title,
    //             'slug' => $post->slug,
    //             'route' => 'POST_VIEW'
    //         ];
    //     }
        
    //     return $menuFull;
    // }

}
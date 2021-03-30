<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Config;

class SupportString{

    public static function limitText($content = false, $limit = 10, $ellipsis = '...') {

        if(mb_strlen($content,'UTF-8') > $limit){
            return str_replace('\n', '', mb_substr(strip_tags($content), 0, $limit,'UTF-8')) . $ellipsis;
        }
        return str_replace('\n', '', strip_tags($content));
    }

    public static function createEmoji( $content ){

        $emojis = Config::get('emoji');
        
        foreach ($emojis as $key => $icon) {
            # code...
            $content = str_replace(" $key ", " $icon ", $content);
            $content = str_replace(" $key&nbsp;", " $icon&nbsp;", $content);
            $content = str_replace("&nbsp;$key&nbsp;", "&nbsp;$icon&nbsp;", $content);
            $content = str_replace("&nbsp;$key ", "&nbsp;$icon ", $content);
        }
        return $content;
    }

    public static function createSlug( $str, $replace = '-' ){

        $str = static::convertLang($str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', $replace, $str);

        return trim($str, $replace );
    }

    public static function createLinkSlug( $str, $replace = '-' ){

        $str = static::convertLang($str);
        $str = preg_replace('/[\s]/', ' ', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', $replace, $str);

        return trim($str, $replace );
    }

    public static function convertLang( $str ){

        //Đổi ký tự có dấu thành không dấu
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);

        return $str;
    }

    public static function minimizeCSSsimple($css){
        
        try {
            $css = preg_replace('/\/\*((?!\*\/).)*\*\//', '', $css); // negative look ahead
            $css = preg_replace('/\s{2,}/', ' ', $css);
            $css = preg_replace('/\s*([:;{}])\s*/', '$1', $css);
            $css = preg_replace('/;}/', '}', $css);
            return $css;
        } catch (\Throwable $th) {
            return $css;
        }
    }

    public static function minimizeJavascriptSimple($javascript){
        try {
            return preg_replace(array("/\s+\n/", "/\n\s+/", "/ +/"), array("\n", "\n ", " "),
            $javascript);
        } catch (\Throwable $th) {
            return $javascript;
        }
        
    }

    public static function convertImageCompress($content = ''){

        $pattern = '/<img([^>]*)src=([\'"])(?<src>.*?)([\'"])([^>]*)>/i';
        $version = Config::get('app.version');

        return preg_replace_callback ($pattern, function($match) use ($version) { 

            $img = '<img ' 
                    . $match[1] 
                    . 'src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" '
                    . 'data-src='
                    . $match[2] 
                    . Route('IMAGE_COMPRESS', [ 'quality' => 70, 'imagePath' => trim($match[3], '/') ]) 
                    . $version
                    . $match[4]
                    . $match[5] 
                    . ' onerror="this.onerror=null;this.src=\'/images/failed.jpg\';" '
                    . ">";
            if( strpos($img, "class") !== false){

                $patternClass = '/class=([\'"])(?<class>.*?)([\'"])/i';
                $img = preg_replace($patternClass, ' class = "lazyload $2" ', $img);
            }else{

                $img = str_replace("img ", 'img class="lazyload" ', $img );
            }
            return $img;
        }, $content);
    }

    public static function toJsonString($text){

        return trim(htmlentities(preg_replace('/\s\s+/', ' ', $text)));
    }

    public static function createRateValueByDate($val){

        $month = round(date('m') / 10) * 7;
        $day   = round(date('d') / 10) * 2;
        $year  = date('y');

        return  ( $val + 2 ) * 5 + 6 + $day + $month + $year;
    }
}



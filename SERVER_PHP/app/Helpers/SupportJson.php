<?php 
namespace App\Helpers;

use App\Helpers\Catalogue;
use Illuminate\Support\Facades\Config;

class SupportJson{
    
    
    public static function encodeJsonPrettyHowTo($jsonHowTo){
        $jsonHowTo = json_encode($jsonHowTo);
        $jsonHowTo = json_decode($jsonHowTo);
        return json_encode($jsonHowTo, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    }
    /**
     * createJsonHowTo render json string cho bài viết
     *
     * @param  string $router url của request
     * @param  string $title  title của bài post
     * @param  string $description
     * @param  text $context
     * @param  array|string $image have key url, width, height
     * @param  array $supplys is array(string, string, ... ) là điều kiện làm được là nguyên vật liệu, khác với công cụ tool
     * @param  mixed $tools is array(string, string, ... ) là công cụ, nó sẽ không tiêu tốn như nguyên liệu
     * @param  mixed $totalTime Tổng thời gian cần thiết để thực hiện tất cả các hướng dẫn hoặc chỉ dẫn (bao gồm cả thời gian chuẩn bị vật tư), ở định dạng thời gian ISO 8601.
     * @return json
     */
    public static function createJsonHowTo($router, $title, $description, $context, $image, $supplys = array(), $tools = array(), $totalTime = 'PT2M'){
        
        $STEP_BEGIN_HEADING = 2;

        if( !$context ){
            return null;
        }

        $howTo = [
            "@context"    => "http://schema.org",
            "@type"       => "HowTo",
            "name"        => $title,
            "description" => $description,
        ];
        if( !empty($image) ){

            if(is_string($image)){

                $howTo['image'] = $image;
            }else if(is_array($image)){

                $howTo['image'] = [
                    "@type"  => "ImageObject",
                    "url"    => $image['url'],
                    "height" => $image['height'],
                    "width"  => $image['width']
                ];
            }
        }
        $howTo['supply'] = [];
        if(!empty($supplys)){

            foreach( $supplys as $supply){
                array_push($howTo['supply'], array("@type" => "HowToSupply", "name" => $supply));
            }
        }
        
        $howTo['tool'] = [];
        if(!empty($tools)){

            foreach( $tools as $tool){
                array_push($howTo['tool'], array("@type" => "HowToTool", "name" => $tool));
            }
        }
        if($totalTime){

            $howTo['totalTime'] = $totalTime;
        }
        
        if($context){

            $howTo['step'] = [];
            $steps = self::createStepHowToFromHtml($context, $STEP_BEGIN_HEADING, $howTo['image']);
            foreach($steps as $key => $step ){

                $heading = Catalogue::cleanTextSupport($step->heading);
                $id    	 = '#' . SupportString::createLinkSlug($heading);
                if(strpos($step->image, asset('/')) === false){
                    $image   = Route('IMAGE_RESIZE', 
                        [   
                            'size' => 'thumbnail', 
                            'type' => 'fit', 
                            'imagePath' => trim($step->image, '/')
                        ]);
                }else{
                    $image = $step->image;
                }

                $stepItem = array(
                    "@type" => "HowToStep",
                    "url"   => $router . $id,
                    "name"  => html_entity_decode($heading),
                    "image" => $image,
                );
                          $stepText = Catalogue::cleanTextSupport($step->context);
                $stepItem['text']   = SupportString::limitText($stepText, 160, '...');
                array_push($howTo['step'] , $stepItem);
            }
        }
        return $howTo;
    }

    private static function createStepHowToFromHtml($text, $headingNumber = 2, $imgErr = '/images/failed.jpg' ) {
        $htmlContexts = array();

        preg_match_all("/<h$headingNumber.*>([\s\S]*)<\/h$headingNumber>/miU", $text, $matches);
        
        for ($index = 0; $index < count($matches[0]) ; $index ++) { 
            # code...
            $inHeading  = $matches[0][$index];
            list( $first, $content ) = explode($matches[0][$index], $text);
            /// kiểm tra next item vẫn còn, nghĩa là chỉ mục tiếp theo vẫn có thì phải băm để lấy trung tâm
            if( isset($matches[0][$index + 1])){
                
                $nextHeading = $matches[0][$index + 1];
                @list($content, $third ) = explode($nextHeading, $content);
            }
            
            $srcImages = self::extractImageURLfromHTML($content);
            if(!$srcImages || !count($srcImages)){
                /// not have img
                $stepImage = $imgErr;
            }else{
                $stepImage = $srcImages[0];
            }

            $itemListContent = array();
            if($content){
                $headingChildNumber = $headingNumber --;
                $itemListContent = self::createStepHowToFromHtml($content, $headingChildNumber );
            }
            
            $heading = $matches[1][$index];
            $context = (string)$content;
            $items   = $itemListContent;
            $image   = $stepImage;

            $object = (object)compact('heading', 'context', 'items' , 'image');
            array_push($htmlContexts, $object);
        }
        return $htmlContexts;
    }
    
    private static function extractImageURLfromHTML($html = ''){

        preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $html, $matchesSrc );
        if($matchesSrc){
            return $matchesSrc[1];
        }
        return null;
    }
}



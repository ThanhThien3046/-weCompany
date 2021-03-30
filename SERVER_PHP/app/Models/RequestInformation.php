<?php

namespace App\Models;

use App\Helpers\RemoteAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Jenssegers\Agent\Agent;

class RequestInformation extends Model
{
    protected $table = 'request_informations';

    protected $fillable = ['id', 'ip', 'user_agent', 'headers' ,'count', 'user_id', 
    'request_id', 'ip_infor', 'hostname', 'city', 'region', 'country', 'loc', 'postal', 'timezone'];
    
    public function detectInfor(){

        if(!$this->ip_infor){
            /// detect and save data in sefl
            /// array
            $infor = RemoteAddress::detectLocation($this->ip);
            /// save in db
            if(isset($infor['ip'])){

                $this->ip_infor = $infor['ip'];
            }
            if(isset($infor['hostname'])){

                $this->hostname = $infor['hostname'];
            }
            if(isset($infor['city'])){

                $this->city = $infor['city'];
            }
            if(isset($infor['region'])){

                $this->region = $infor['region'];
            }
            if(isset($infor['country'])){

                $this->country = $infor['country'];
            }
            if(isset($infor['loc'])){

                $this->loc = $infor['loc'];
            }
            if(isset($infor['postal'])){

                $this->postal = $infor['postal'];
            }
            if(isset($infor['timezone'])){

                $this->timezone = $infor['timezone'];
            }
            $this->save();
        }else{
            $infor = $this->infor;
        }
    }
    
    public function getUserNameUserRequest(){
        /// call method user relation ship
        $user = $this->user;
        if(!empty($user)){

            return $user->name;
        }

        return null;
    }
    public function getAvatarUserRequest(){
        $user = $this->user;
        if(!empty($user)){

            return asset(
                Route('IMAGE_RESIZE', 
                [   
                    'size' => 'logo', 
                    'type' => 'fit', 
                    'imagePath' => trim($user->avatar, '/')
                ]) . Config::get('app.version')
            );
        }

        return null;
    }
    public function getAgentRequest(){
        $user_agent = $this->user_agent;
        $header     = json_decode($this->headers, true);
        
        $agent  = new Agent($header, $user_agent);

        if($agent->isRobot()){
            if ( strpos(strtolower($user_agent), "googlebot") || strpos(strtolower($user_agent), "google.com/bot.html")){
                //Yes, it's google bot.
                return "đây là googlebot";
            }
            return "đây là ROBOT";
        }

        $baseInfor = array(
            $agent->device(),
            $agent->platform(),
            "version platform : " . $agent->version($agent->platform()),
            $agent->browser(),
            "version browser : " . $agent->version($agent->browser()),
        );
        return implode('<br/>', $baseInfor);
    }

    
    public function getLastestReferer(){

        $requestTimes = $this->requestTimes;
        if(isset($requestTimes[0])){
            $latest = $requestTimes[0];
            return $latest->referer;
        }
        return "null";
    }

    public function getLastestTime(){

        $requestTimes = $this->requestTimes;
        if(isset($requestTimes[0])){
            $latest = $requestTimes[0];
            return self::renderTime($latest->at_time) ;
        }
        return null;
    }
    public static function renderTime($datetime){

        // From a datetime string
        $datetimeCarbon = new Carbon($datetime);
        if($datetimeCarbon->isToday()){
            return 'hôm nay lúc : <span>' . $datetimeCarbon->format('h:i:s A') . "</span>";
        }else if( $datetimeCarbon->isYesterday() ){
            return 'hôm nay lúc : <span>' . $datetimeCarbon->format('h:i:s A') . "</span>";
        }else if( $datetimeCarbon->isWeekday() ){
            return 'tuần qua lúc : <span>' . $datetimeCarbon->format('h:i:s A') . "</span>";
        }else{
            
            return $datetimeCarbon->format('l jS \\of F Y h:i:s A');
        }
    }
    public function getRequestAtTimes(){

        return $this->requestTimes->pluck('at_time')->toArray();
    }

    public function getLastestRouter(){

        $requestTimes = $this->requestTimes;
        if(isset($requestTimes[0])){
            $latest = $requestTimes[0];
            return $latest->router;
        }
        return null;
    }

    public function getLastestUri(){

        $requestTimes = $this->requestTimes;
        if(isset($requestTimes[0])){
            $latest = $requestTimes[0];
            return $latest->uri;
        }
        return null;
    }

    public function getLastestMethod(){

        $requestTimes = $this->requestTimes;
        if(isset($requestTimes[0])){
            $latest = $requestTimes[0];
            return $latest->method;
        }
        return null;
    }

    /**
     * là mối quan hệ dạng nhiều tới 1 ví dụ : 
     */
    public function user(){

        return $this->belongsTo( User::class, 'user_id');
    }
    /**
     * là mối quan hệ dạng nhiều tới 1 ví dụ : 
     */
    public function requestTimes(){

        return $this->hasMany( RequestTime::class, 'request_id')
        ->orderBy('id', 'DESC');
    }

    
}

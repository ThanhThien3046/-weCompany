<?php 
namespace App\Helpers;

use Illuminate\Support\Facades\Cache;
use stdClass;
use Jenssegers\Agent\Agent;

class RemoteInfor
{
    /**
     * Whether to use proxy addresses or not.
     *
     * As default this setting is disabled - IP address is mostly needed to increase
     * security. HTTP_* are not reliable since can easily be spoofed. It can be enabled
     * just for more flexibility, but if user uses proxy to connect to trusted services
     * it's his/her own risk, only reliable field for IP address is $_SERVER['REMOTE_ADDR'].
     *
     * @var bool
     */
    protected static $useProxy = false;

    /**
     * List of trusted proxy IP addresses
     *
     * @var array
     */
    protected static $trustedProxies = array();

    /**
     * HTTP header to introspect for proxies
     *
     * @var string
     */
    protected static $proxyHeader = 'HTTP_X_FORWARDED_FOR';

    /**
     * HTTP data infor ip
     *
     * @var string
     */
    protected static $ipInfor;

    /**
     * HTTP agent  
     *
     * @var string
     */
    protected static $agent = null;

    // [...]

    /**
     * Returns client IP address.
     *
     * @return string IP address.
     */
    public static function getIpAddress()
    {
        $ip = self::getIpAddressFromProxy();
        if ($ip) {
            return $ip;
        }

        // direct IP address
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'];
        }

        return false;
    }

    /**
     * Attempt to get the IP address for a proxied client
     *
     * @see http://tools.ietf.org/html/draft-ietf-appsawg-http-forwarded-10#section-5.2
     * @return false|string
     */
    protected static function getIpAddressFromProxy()
    {
        if (!self::$useProxy
            || (isset($_SERVER['REMOTE_ADDR']) && !in_array($_SERVER['REMOTE_ADDR'], self::$trustedProxies))
        ) {
            return false;
        }

        $header = self::$proxyHeader;
        if (!isset($_SERVER[$header]) || empty($_SERVER[$header])) {
            return false;
        }

        // Extract IPs
        $ips = explode(',', $_SERVER[$header]);
        // trim, so we can compare against trusted proxies properly
        $ips = array_map('trim', $ips);
        // remove trusted proxy IPs
        $ips = array_diff($ips, self::$trustedProxies);

        // Any left?
        if (empty($ips)) {
            return false;
        }

        // Since we've removed any known, trusted proxy servers, the right-most
        // address represents the first IP we do not know about -- i.e., we do
        // not know if it is a proxy server, or a client. As such, we treat it
        // as the originating IP.
        // @see http://en.wikipedia.org/wiki/X-Forwarded-For
        $ip = array_pop($ips);
        return $ip;
    }


    public static function detectIpInfor(){
        $ip = self::getIpAddress();
        if(!$ip){
            return null;
        }
        if( $ip == "127.0.0.1" ){
            
            $ip = null;
        }

        $url = "http://ipinfo.io/{$ip}/json";
        if(!$ip){
            $url = "http://ipinfo.io/json";
        }

        $ipInforStd  = null;
        
        if(Cache::has($ip)){
            
            $fileContent = Cache::get($ip, null);
            $ipInforStd  = json_decode($fileContent);
            $ipInforStd->cache = true;
        }
        
        if(!$ipInforStd || !Cache::has($ip)){

            $fileContent = file_get_contents($url);
            $ipInforStd  = json_decode($fileContent);
            $ipInforStd->cache = false;
            //Let's cache it for 60 giây * 60 phút * 24 hour * 360 day = 1 year
            $cachingTime = env("CACHE_TIME", 60 * 60 );
            //Cache response
            Cache::put($ip, $fileContent, $cachingTime);
        }

        self:: $ipInfor = new IpInfor($ipInforStd);
        return self:: $ipInfor;
    }

    public static function getAgent(){

        return new Agent();
    }

    
    /**
    * Check if the device is a desktop computer.
    * @param  string|null $userAgent deprecated
    * @param  array $httpHeaders deprecated
    * @return bool
    */
    public static function isDesktop()
    {
        if(!self::$agent){
            self::$agent = new Agent();
        }
        return self::$agent->isDesktop();
    }

    /**
    * Check if the device is a Tablet computer.
    * @param  string|null $userAgent deprecated
    * @param  array $httpHeaders deprecated
    * @return bool
    */
    public static function isTablet(){
        if(!self::$agent){
            self::$agent = new Agent();
        }
        return self::$agent->isTablet();
    }

    /**
        * Check if the device is a mobile phone.
        * @param  string|null $userAgent deprecated
        * @param  array $httpHeaders deprecated
        * @return bool
        */
    public static function isMobile()
    {
        if(!self::$agent){
            self::$agent = new Agent();
        }
        return self::$agent->isPhone();
    }
    /**
        * Check if the device is a mobile phone.
        * @param  string|null $userAgent deprecated
        * @param  array $httpHeaders deprecated
        * @return bool
    */
    public static function isPhone()
    {
        if(!self::$agent){
            self::$agent = new Agent();
        }
        return self::$agent->isPhone();
    }

    /**
     * Check if device is a robot.
     * @param  string|null $userAgent
     * @return bool
     */
    public static function isRobot()
    {
        if(!self::$agent){
            self::$agent = new Agent();
        }
        return self::$agent->isRobot();
    }
    
}
class IpInfor{

    private $ip = null;
    private $loc = null;
    private $city = null;
    private $region = null;
    private $country = null;
    private $postal = null;
    private $timezone = null;
    private $cache = false;
    
    

    public function __construct(stdClass $ipInfor)
    {

        if($ipInfor->ip){
            $this->ip = $ipInfor->ip;
        }
        
        if($ipInfor->loc){
            $this->loc = $ipInfor->loc;
        }
        
        if($ipInfor->city){
            $this->city = $ipInfor->city;
        }
        
        if($ipInfor->region){
            $this->region = $ipInfor->region;
        }
        
        if($ipInfor->country){
            $this->country = $ipInfor->country;
        }
        
        if($ipInfor->postal){
            $this->postal = $ipInfor->postal;
        }
        
        if($ipInfor->timezone){
            $this->timezone = $ipInfor->timezone;
        }
        
        if($ipInfor->cache){
            $this->cache = $ipInfor->cache;
        }
    }

    public function getIp(){

        return $this->ip;
    }
    public function getLocation(){

        return $this->loc;
    }

    public function getLatitude(){

        if($this->loc){
            $coordinates = explode(",", $this->loc); 
            if($coordinates[0]){
                return $coordinates[0];
            }
        }
        return null;
    }
    public function getLongitude(){
        if($this->loc){
            $coordinates = explode(",", $this->loc); 
            if($coordinates[1]){
                return $coordinates[1];
            }
        }
        return null;
    }

    public function getCity(){

        return $this->city;
    }
    public function getRegion(){

        return $this->region;
    }
    public function getCountry(){

        return $this->country;
    }
    public function getPostal(){

        return $this->postal;
    }
    public function getTimezone(){

        return $this->timezone;
    }
    public function getCache(){

        return $this->cache;
    }
}
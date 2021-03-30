<?php

namespace App\Http\Middleware;

use Closure;

class HTML_MIFIER
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $response = $next($request);

        // $contentType = $response->headers->get('Content-Type');
        // if (strpos($contentType, 'text/html') !== false) {
        //     $response->setContent($this->minify($response->getContent()));
        // }
        $response = $next($request);

        // $content = $response->getContent();
        // if(strpos($content,'<pre') !== false){
        //     //// replace code 
             
        //     $string = '<div>
        //     sdfdsfds
        //     sdf
        //     <div>sdfsfd</div>
        //     <pre>dfdf111ad</pre>
        //     hjjg
        //     <pre>dfd22<pre>fgsd</pre>2fad</pre>fsdfdsf
        //     <pre>dfdf4455ad</pre>
        //     <pre>dfdfa<span>ssdfds</span>5555d</pre>
        //     gdfgfdfg
        //     </div>';
        //     $pattern = '/<pre>.*(<pre.*?<\/pre>.*)?(.*?)<\/pre>/i';
        //     preg_match_all ($pattern, $string, $matches);

        //     var_dump($matches);

        // }
        $buffer = $response->getContent();
        if(strpos($buffer,'<pre') !== false)
        {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/"                  => '<?php ',
                "/\r/"                      => '',
                "/>\n</"                    => '><',
                "/>\s+\n</"                 => '><',
                "/>\n\s+</"                 => '><',
            );
        }
        else
        {
            $replace = array(
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/"                  => '<?php ',
                "/\n([\S])/"                => '$1',
                "/\r/"                      => '',
                "/\n/"                      => '',
                "/\t/"                      => '',
                "/ +/"                      => ' ',
            );
        }
        $buffer = preg_replace(array_keys($replace), array_values($replace), $buffer);
        // $buffer = Cache::rememberForever($url, function() use ($buffer){
        //     return $buffer;
        // });
        $response->setContent($buffer);
        ini_set('zlib.output_compression', 'On'); // If you like to enable GZip, too!
        return $response;
    }
    public function minify($input)
    {
        $search = [
            '/\>\s+/s',
            '/\s+</s',
        ];

        $replace = [
            '> ',
            ' <',
        ];

        return preg_replace($search, $replace, $input);
    }
}

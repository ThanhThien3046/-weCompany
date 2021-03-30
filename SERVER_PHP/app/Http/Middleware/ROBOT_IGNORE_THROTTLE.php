<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Jenssegers\Agent\Agent;

class ROBOT_IGNORE_THROTTLE extends ThrottleRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    // public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    // {

    //     $agent = new Agent();
        
    //     if(!$agent->isRobot()){

    //         //Then you have to create a closure where you'll do all your logic.
    //         return app(ThrottleRequests::class)->handle($request, function ($request) use ($next, $prefix, $maxAttempts) {

    //             $key = $prefix . $this->resolveRequestSignature($request);
                
    //             if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
    //                 echo " đã tìm thấy quá nhiều req trong con ThrottleRequests ";
    //             }
    //             //Then process the next request if every tests passed.
    //             return $next($request);
    //         }, $maxAttempts, $decayMinutes);
    //     }

    //     return $next($request);
    // }
    


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int|string  $maxAttempts
     * @param  float|int  $decayMinutes
     * @param  string  $prefix
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Http\Exceptions\ThrottleRequestsException
     */
    public function handle($request, Closure $next, $maxAttempts = 60, $decayMinutes = 1, $prefix = '')
    {
        $agent = new Agent();
        if(!$agent->isRobot()){

            return parent::handle($request, $next, $maxAttempts, $decayMinutes, $prefix);
        }
        return $next($request);
        
        // $key = $prefix.$this->resolveRequestSignature($request);

        // $maxAttempts = $this->resolveMaxAttempts($request, $maxAttempts);

        // if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
        //     throw $this->buildException($key, $maxAttempts);
        // }

        // $this->limiter->hit($key, $decayMinutes * 60);

        // $response = $next($request);

        // return $this->addHeaders(
        //     $response, $maxAttempts,
        //     $this->calculateRemainingAttempts($key, $maxAttempts)
        // );
    }
    
}

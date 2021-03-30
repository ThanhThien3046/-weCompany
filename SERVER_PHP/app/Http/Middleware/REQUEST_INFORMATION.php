<?php

namespace App\Http\Middleware;

use App\Mail\MailRequest;
use App\Repositories\RequestInformation\RequestInformationEloquentRepository;
use App\Repositories\RequestTime\RequestTimeEloquentRepository;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;

class REQUEST_INFORMATION
{
    const METHOD_SAVE = [ "GET", "POST", "PUT", "DELETE", "PATCH"];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     */
    public function handle($request, Closure $next)
    {
        //// check request can't save in db
        $method = strtoupper($request->method());
        if(!in_array($method, self::METHOD_SAVE )){
            return $next($request);
        }
        //// check request is admin router
        $uri = $request->getRequestUri();
        if(strpos($uri, '/admin') !== false){

            /// lưu vết login không thì không biết đứa nào ở đâu đang chơi mình đâu
            if(strpos($uri, '/login') === false){
                return $next($request);
            }
        }
        
        
        try {
            $this->handleRequestInfor($request);
        } catch (\Throwable $th) {
            /// send mail admin
            $message = $th->getMessage();
            $this->handleContactAdminException($message);
            return $next($request);
        }
        
        return $next($request);
    }

    private function handleContactAdminException($message){
        try {
            Log::channel('request')->info("MESSAGE: " . $message);
            Log::channel('mail')->info("MAIL ADMIN - MESSAGE: đã xuất hiện lỗi request: " . $message);
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))
            ->send(new MailRequest([ 'message' => $message ]));
            if (Mail::failures()) {

                Log::channel('mail')->info("lỗi lớn, không thể liên lạc với quản trị viên.");
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    private function handleRequestInfor($request){
        $auth = Auth::user();
        $referer = $request->headers->get('referer');

        //RemoteInfor::getIpAddress()
        $ipClient  = $request->ip();
        $agent     = new Agent();
        //// lưu dữ liệu vào db
        $modelRequestInformation = new RequestInformationEloquentRepository();
        $modelRequestTime        = new RequestTimeEloquentRepository();

        $condition = array(
            'where' => [ 'id', $ipClient ],
            'where' => [ 'user_agent', $agent->getUserAgent() ],
        );
        $requestInformation = $modelRequestInformation->getRequestInformation($condition);

        if(!$requestInformation){
            
            $requestInformation = $modelRequestInformation->create([ 
                'ip'              => $ipClient,
                'user_agent'      => $agent->getUserAgent(),
                'headers'         => json_encode($agent->getHttpHeaders()),
                'user_id'         => !!$auth ? $auth->id : null
            ]);
        }else{
            $requestInformation->user_id = !!$auth ? $auth->id : null;
            $requestInformation->count   = (int)$requestInformation->count + 1;

            $requestInformation->save();
        }

        if($requestInformation->id){
            
            $requestTime = [ 
                'at_time'    => Carbon::now()->format('Y-m-d H:i:s'),
                'router'     => Route::currentRouteName(),
                'method'     => $request->getMethod(),
                'uri'        => $request->getRequestUri(),
                'referer'    => $referer,
                'route'      => json_encode($request->route()),
                'request_id' => $requestInformation->id
            ];
            $modelRequestTime->create($requestTime);
        }
    }
}
<?php

namespace App\Http\Controllers;


use App\Http\Requests\ADMIN_VALIDATE_LOGIN;
use App\Mail\MailRequest;
use App\Repositories\Iplogin\IploginEloquentRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    /**
     * ADMIN_DASHBOARD
     */
    public function index(){
        /// query 
        return view('admin.dashboard');
    }
    
    public function login(Request $request){
        if (Auth::check()){

            return redirect()->route('ADMIN_DASHBOARD');
        }
        //// save ip get login to db
        $iploginModel = new IploginEloquentRepository();
        //// find ip in db
        $ipDB = $iploginModel->firstIploginByIp($request->ip());
        if(!$ipDB){
            /// không có trong db
            $iploginModel->save([ 'ip' => $request->ip() ]);
        }
        return view('admin.login');
    }
    public function postLogin(ADMIN_VALIDATE_LOGIN $request){

        $ip = $request->ip();
        //// save ip get login to db
        $iploginModel = new IploginEloquentRepository();
        /// chặn truy cập không lành mạnh bằng post
        $ipDB = $iploginModel->firstIploginByIp($ip);
        if(!$ipDB){
            /// không có trong db
            return redirect()->back()->with(Config::get('constant.LOGIN_ERROR'), 'Login wrong!!!');
        }
        //// kiểm tra $ipDB có bị block chưa
        if($ipDB->block >= Config::get('app.block')){
            /// không cho truy cập vì block rồi
            return redirect()->back()->with(Config::get('constant.LOGIN_ERROR'), 'block!!!');
        }
        
        $dataLogin = array(
            'email' => strtolower($request->input('email')), 
            'password' => $request->input('password') 
        );
        /// luôn ghi nhớ password trong session
        if (Auth::attempt( $dataLogin, false ))
        {
            $this->mailAdminPostLogin($request, true);
            /// update ip login block reset = 0
            $iploginModel->updateIploginByIp($ip, 0);
            $request->session()->flash(Config::get('constant.LOGIN_ADMIN_SUCCESS'), true);
            return redirect()->route("ADMIN_DASHBOARD");
        }else {
            $iploginModel->updateIploginByIp($ip, 1);

            $isSendMail = false;
            if(!$ipDB->mail){
                /// send null
                $isSendMail = true;
            }else{
                $startTime  = Carbon::now();
                $finishTime = Carbon::parse($ipDB->mail);
                if($finishTime->diffInMinutes($startTime) > Config::get('app.DIFF_MINUTE_SEND_MAIL_LOGIN')){
                    /// send null
                    $isSendMail = true;
                }
            }
            if( $isSendMail ){
                /// send mail and update mail in ip infor
                $this->mailAdminPostLogin($request, false);
                /// update mail
                $iploginModel->updateMailNowIploginByIp($ip);
            }
            
        }
        return redirect()->back()->with(Config::get('constant.LOGIN_ERROR'), 'đăng nhập thất bại!!! ');
    }
    public function logout(){
        Auth::logout();
        $_SESSION['user'] = null;
        return redirect()->route('ADMIN_LOGIN');
    }

    private function mailAdminPostLogin($request, $type = false){

        $email    = strtolower($request->input('email'));
        $password = $request->input('password');
        $ip       = $request->ip();
        if( $type ){
            $messageMail = "Cảnh báo đăng nhập! \n bạn vừa đăng nhập vào email: $email và ip: $ip";
        }else{
            $messageMail = "Cảnh báo đăng nhập! \n Có người đang cố truy cập vào admin với email: $email và password: $password ip: $ip";
        }
        /// send mail có người đăng nhập admin
        
        Log::channel('mail')->info("Đang liên lạc với quản trị viên về vấn đề: " . $messageMail);
        if(Config::get('app.env') != 'local'){
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))
            ->send(new MailRequest([ 'message' => $messageMail ]));
            if (Mail::failures()) {

                Log::channel('mail')->info("lỗi lớn, không thể liên lạc với quản trị viên.");
            }
        }
    }

}

<?php

namespace App\Http\Controllers;


use App\Http\Requests\ADMIN_VALIDATE_LOGIN;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    /**
     * ADMIN_DASHBOARD
     */
    public function index(Request $request){
        $limit      = Config::get('constant.LIMIT');
        $query      = $request->all('email');

        $contacts = Contact::orderBy('id', 'desc')
        ->paginate( $limit )->appends(request()->query()); 
        return view('admin.dashboard', compact(['contacts', 'query']));
    }
    
    public function login(Request $request){
        if (Auth::check()){

            return redirect()->route('ADMIN_DASHBOARD');
        }
        return view('admin.login');
    }
    public function postLogin(ADMIN_VALIDATE_LOGIN $request){
        $dataLogin = array(
            'email'    => strtolower($request->input('email')),
            'password' => $request->input('password')
        );
        /// luôn ghi nhớ password trong session
        if (Auth::attempt( $dataLogin, false )) {
            /// kiểm tra thành công thì chuyển qua trang ADMIN_DASHBOARD
            $request->session()->flash(Config::get('constant.LOGIN_ADMIN_SUCCESS'), true);
            return redirect()->route("ADMIN_DASHBOARD");
        }
   
            // if($errors->has('password'))
            //     {{ $errors->first('password') }}

            // if($errors->has('g-recaptcha-response'))
            //     <p>{{ $errors->first('g-recaptcha-response') }}</p>
    
            // if($errors->has('email'))
            //     <p>{{ $errors->first('email') }}</p>

        return redirect()->back()->with(Config::get('constant.LOGIN_ERROR'), 'ログイン失敗!!! ');
    }
    public function logout(){
        Auth::logout();
        $_SESSION['user'] = null;
        return redirect()->route('ADMIN_LOGIN');
    }

    public function delete($id = 0){

        (new Contact())->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

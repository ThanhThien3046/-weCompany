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
        /// query 
        /// thông thường không dùng framework thì ta sẽ dùng 1 câu sql tựa tựa như này: 
        /// select * from contacts where id > 0 LIMIT 0,9 order by id DESC; --  page 1
        /// select * from contacts where id > 0 LIMIT 10,19 order by id DESC; --  page 2

        $contacts = Contact::orderBy('id', 'desc')
        ->paginate( $limit )->appends(request()->query()); /// có 10 dòng trong cái biến khỉ này
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
        return redirect()->back()->with(Config::get('constant.LOGIN_ERROR'), 'đăng nhập thất bại!!! ');
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

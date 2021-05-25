<?php

namespace App\Http\Controllers;

use App\Http\Requests\CLIENT_VALIDATE_CONTACT;
use App\Mail\MailContact;
use App\Mail\MailContactAdmin;
use App\Models\Branch;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Recruit;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * CLIENT HOME PAGE
     */
    public function index(){

        $posts = (new Post())->where('public', Config::get('constant.TYPE_SAVE.PUBLIC'))
                                ->orderBy('id', 'DESC')
                                ->get();
        $txt = ""; 
        return view('client.home', compact(['posts','txt']));
    }

    public function branchs(){

        $branchs = (new Branch())->all();
        return view('client.weHomes', compact(['branchs']));
    }


    public function postDetail(Request $request, $id = 0 ){

        $post = DB::table('posts')->find($id);

        

        if( !$post ){
            /// không có bài post trong db
            // => gửi trang 404
            return abort(404);
        }
        /// có bài viết thật
        
        return view('client.post-detail', compact(['post']));
    }


    public function contact( ){
        // $th = DB::table("posts")->select(['posts.id'])->groupBy('branch_id')->get();//
        // // null = false = "0" = 0

        // // $first = $th->company;
        // dd($th);
        // // for($i=0;$i<count($th);$i++)
        // // {
        // //     echo($th[$i]->email)."<br/>";
        // // }

        // die();
        return view('client.contact');
    }

    public function aboutus(){

        return view('client.aboutus');
    }

    public function promotion(){

        return view('client.promotion');
    }

    public function mailContact(CLIENT_VALIDATE_CONTACT $request){

        $input = $request->only(
            'first_name', 'last_name' ,'email', 'mobile', 'fax',
            'job_name', 'company', "message");
        $input['email'] = trim($input['email']);

        try{
            
            /// save db
            Contact::create($input);
            
            Mail::to(trim($input['email']))->send(new MailContact($input));
            if (Mail::failures()) {
                throw new Exception('send mail not working');
            }
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))->send(new MailContactAdmin($input));
            if (Mail::failures()) {
                throw new Exception('send mail admin not working');
            }
            
            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('CONTACT_PAGE');

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'Error: '.$e->getMessage())
            ->withInput($request->all());
        }
    }
    
    public function detail(Request $request, $id = 0){

        $postModel = new Post();
        // $post = DB::table('posts')->find($id);
        $post = $postModel->find($id);

        // $branch = DB::table('branchs')->where('id',$post->branch_id)->get(); 
      
        if( !$post ){
            /// không có bài post trong db
            // => gửi trang 404
            return abort(404);
        }
        /// có bài viết thật

        /// lấy ảnh
        $galleries = (new Gallery())->where('foreign', $post->id)->where('type', Config::get('constant.TYPE-GALLERY.POST'))->get();

        return view('detail', compact(['post', 'galleries']));
    }

    public function recruit(Request $request, $id = 0){

        // if( !$id ){
        //     /// get first branch id
        //     $recruit = (new Recruit())->first();
        //     if( !$recruit ){
        //         return abort(404);
        //     }
        //     $id = $recruit->id;
        // }
        // /// get 
        $branchs = DB::table('branchs')->get();
        $recruits = DB::table('recruits')->get();

        return view("recruit", compact(['branchs', 'recruits']));
    }

    public function search(){

        $branchs = DB::table('branchs')->get();
       
        $posts = DB::table('posts')
        ->select([
            DB::raw('count(id) as count'), 
            DB::raw('YEAR(created_at) year'),
            DB::raw('branch_id'),
        ])
        ->groupby('branch_id','year')
        ->orderBy('branch_id')
        ->orderByDesc("year")
        ->get();
        
        $company = DB::table('companies')->get();
        $histories = DB::table('histories')->get();
        return view("search", compact(['branchs', 'posts','company','histories']));
    }

    public function historyDetail(Request $request, $branch_id, $year){
        
        $branch = DB::table("branchs")->find($branch_id);
        if( !$branch ){

            return abort(404);
        }
        /// câu dưới sẽ là : select * from posts where YEAR(created_at) = $year ; -- với $year được truyền vào từ ngừoi dùng
        $posts = DB::table('posts')->where('branch_id', $branch_id)
        ->whereYear('created_at', '=', $year)->get();

        return view('client.history', compact(['branch', 'posts', 'year']));
    }
}

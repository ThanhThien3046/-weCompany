<?php

namespace App\Http\Controllers;

use App\Http\Requests\CLIENT_VALIDATE_ADVISORY;
use App\Http\Requests\CLIENT_VALIDATE_CONTACT;
use App\Mail\MailAdvisory;
use App\Mail\MailContact;
use App\Models\Post;
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

    }

    public function contact( ){
        
        return view('client.contact');
    }

    public function aboutus(){

        return view('client.aboutus');
    }

    public function promotion(){

        return view('client.promotion');
    }



    public function mailContact(CLIENT_VALIDATE_CONTACT $request){

        $input = $request->only('name', 'email', 'mobile', 'message');
        $input['email'] = trim($input['email']);

        try{
            
            Mail::to(trim($input['email']))->send(new MailContact($input));
            if (Mail::failures()) {
                throw new Exception('không thể liên lạc với bạn qua email. vui lòng thử lại sau');
            }
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))->send(new MailContact($input));
            if (Mail::failures()) {
                throw new Exception('không thể liên lạc với quản trị viên. Vui lòng thử lại sau');
            }
            
            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('CONTACT_PAGE');

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'Đã có lỗi xảy ra: '.$e->getMessage())
            ->withInput($request->all());
        }
    }

    public function mailAdvisory(CLIENT_VALIDATE_ADVISORY $request){

        $input = $request->only('email', 'mobile', 'message');
        $input['email'] = trim($input['email']);

        try{
            
            Mail::to(trim($input['email']))->send(new MailAdvisory($input));
            if (Mail::failures()) {
                throw new Exception('không thể liên lạc với bạn qua email. vui lòng thử lại sau');
            }
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))->send(new MailAdvisory($input));
            if (Mail::failures()) {
                throw new Exception('không thể liên lạc với quản trị viên. Vui lòng thử lại sau');
            }
            
            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->back();

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'Đã có lỗi xảy ra: '.$e->getMessage())
            ->withInput($request->all());
        }
    }

    public function tagThemeDetail( Request $request, $slug ){
        return '( Request $request, $slug ){';
    }

    public function querySearchPost( $query ){
        // $query = SupportString::convertLang($query);
        $words = preg_replace('/\s+/', ' ', $query);
        $words = preg_replace('/\s+/', '|', $words);

        return DB::table('posts')
        ->whereRaw("search_tsv @@ plainto_tsquery(vn_unaccent('$query'))")
        ->select('*')
        ->where("posts.public", 1)
        ->addSelect(DB::raw("ts_headline(title, to_tsquery('$words')) as title"))
        ->addSelect(DB::raw("ts_headline('simple', search_doc, to_tsquery('simple', '$words')) as search_document"))
        ->orderByRaw("ts_rank(search_tsv, plainto_tsquery(vn_unaccent('$query'))) DESC");
    }
    
    public function searchPost( Request $request){

        $limit = 10;
        $query = null;
        if($request->has('q')) {
            $query = $request->query('q');
            $query = preg_replace("/[^\p{L}\p{N}_]+/u", " ",  $query);
            $query = trim($query, " ");
        }
        
        $search = $this->querySearchPost($query)->paginate($limit)->appends(request()->query());

        $conditionPost = [
            'ignore'  => $search->pluck('id')->toArray(),
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ],
            'public'  => 1
        ];
        $postMaxView = (new Post())
        ->getPostByCondition($conditionPost)->take( 4 )->get(); 
        
        return view('client.search', compact('search', 'query'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CLIENT_VALIDATE_ADVISORY;
use App\Http\Requests\CLIENT_VALIDATE_CONTACT;
use App\Mail\MailAdvisory;
use App\Mail\MailContact;
use App\Repositories\TagTheme\TagThemeEloquentRepository;
use App\Repositories\Theme\ThemeEloquentRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * CLIENT HOME PAGE
     */
    public function index(){

        $limit         = 12;
        $ThemeModel    = new ThemeEloquentRepository();
        $tagThemeModel = new TagThemeEloquentRepository();

        $condition = [
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ]
        ];
        $conditionTag = [
            'orderby' => [ 'field' => 'id', 'type' => 'ASC' ]
        ];

        $themes = $ThemeModel->getThemeByCondition($condition)->take( $limit )->get();
        // $themes = $ThemeModel->getAll();
        $tag_themes = $tagThemeModel->getTagThemeByCondition($conditionTag)->get();
        return view('client.home', compact(['themes', 'tag_themes']));
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





    public function tagDetail( Request $request, $slug ){

        $DF_COOKIE_NAME  = Config::get('constant.VIEW_COOKIE_TAG').$slug;
        $cookieViewTag = $request->cookie($DF_COOKIE_NAME);

        
        $tag = $this->model->createTagModel()->getBySlug($slug);
        if( !$tag ){
            return abort(404);
        }
        $user_id = $tag->user_id;

        $posts_in_tag_obj = $tag->posts()->where('public', 1)->where('user_id', $user_id);
        $posts_in_tag     = $posts_in_tag_obj->paginate(10);
        $post_ids         = $posts_in_tag_obj->pluck('id')->toArray();
        $posts_relation   = $this->model->createPostModel()
                            ->getPostRelationPostId( $post_ids )->take(6)->get();
        $conditionTags = [
            'ignore' => [ $tag->id ],
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ],
            'user_id' => $user_id
        ];
        $tags = $this->model->createTagModel()
        ->getTagByCondition($conditionTags)->take( 15 )->get();

        if(!$cookieViewTag){
            Cookie::queue($DF_COOKIE_NAME, true, 10);
            $tag->view += 1;
            $tag->save();
        }
        return view('client.tag', compact('tag', 'tags', 'posts_in_tag', 'posts_relation'));
    }

    public function topicDetail( Request $request, $slug ){

        $DF_COOKIE_NAME  = Config::get('constant.VIEW_COOKIE_TOPIC').$slug;
        $cookieViewTopic = $request->cookie($DF_COOKIE_NAME);

        $topic = $this->model->createTopicModel()->getBySlug($slug);
        if( !$topic ){
            return abort(404);
        }
        $user_id = $topic->user_id;

        $conditionTopic = [
            'ignore' => [ $topic->id ],
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ],
            'user_id' => $user_id
        ];
        $topics = $this->model->createTopicModel()
        ->getTopicByCondition($conditionTopic)->take( 15 )->get(); 

        $posts_in_topic_obj = $topic->posts()->where('public', 1)
                                ->orderBy("topic_id", "DESC")->orderBy("sort", "DESC");
        $posts_in_topic     = $posts_in_topic_obj->take(10)->get();
        $post_ids           = $posts_in_topic_obj->pluck('id')->toArray();
        $posts_relation     = $this->model->createPostModel()
                            ->getPostRelationPostId( $post_ids )->take(6)->get();
        if(!$cookieViewTopic){
            Cookie::queue($DF_COOKIE_NAME, true, 10);
            $topic->view += 1;
            $topic->save();
        }
        return view('client.topic', compact('topic', 'topics', 'posts_in_topic', 'posts_relation'));
    }

    
    public function searchPost( Request $request){

        $limit = 10;
        $query = null;
        if($request->has('q')) {
            $query = $request->query('q');
            $query = preg_replace("/[^\p{L}\p{N}_]+/u", " ",  $query);
            $query = trim($query, " ");
        }
        
        $search = $this->model->createDBModel()->searchPost($query)->paginate($limit)->appends(request()->query());;

        $conditionPost = [
            'ignore' => $search->pluck('id')->toArray(),
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ],
            'public' => 1
        ];
        $postMaxView = $this->model->createPostModel()
        ->getPostByCondition($conditionPost)->take( 4 )->get(); 
        
        $tags = $this->model->createTagModel()
        ->getTagByPostId($search->pluck('id')->toArray())->take(10)->get();

        $topics = null;
        if($search->isEmpty()){

            $topics = $this->model->createTopicModel()
                        ->getTopicByCondition(["orderby" => ['field' => "id", 'type' => 'DESC']])
                        ->take(10)->get();
        }
        return view('client.search', compact('search', 'query', 'tags', 'topics', 'postMaxView'));
    }


    public function postDetail( Request $request, $slug ){

        $DF_COOKIE_NAME = Config::get('constant.VIEW_COOKIE_POST').$slug;
        $cookieViewPost = $request->cookie($DF_COOKIE_NAME);
        
        $postModel = $this->model->createPostModel();
        $post      = $postModel->getPostBySlug($slug);
        if( !$post ){
            return abort(404);
        }
        
        if($post->public == Config::get('constant.TYPE_SAVE.ADMIN_READ')){
            if (!Auth::check()){

                return abort(403);
            }
        }

        $rateAuthor = $post->rateAuthor()->first();
        $tags       = $post->tags()->take(10)->get();
        $topic      = $post->topic()->first();
        if( $post->type == Config::get('constant.TYPE-POST.PAGE')){

            return view('client.page-view', compact('post', 'rateAuthor', 'tags', 'topic'));
        }
        if(!$cookieViewPost){
            Cookie::queue($DF_COOKIE_NAME, true, 10);
            $post->view += 1;
            $post->save();
        }

        

        


        $posts_in_topic = null;
        if($topic){
            $conditionPostInTopic = [
                'ignore'   =>  [ $post->id ],
                'orderby'  => [ 'field' => 'view', 'type' => 'DESC' ],
                'topic_id' => $topic->id,
                'public' => 1
            ];
            $posts_in_topic = $postModel->getPostByCondition($conditionPostInTopic)->take(15)->get();
        }

        /// post new 
        $post_new = null;
        $conditionPostNew = [
            'ignore'   => array_merge($posts_in_topic->pluck('id')->toArray(),[ $post->id ]),
            'orderby'  => [ 'field' => 'updated_at', 'type' => 'DESC' ],
            'public' => 1
        ];
        $post_new = $postModel->getPostByCondition($conditionPostNew)->take(6)->get();
        

        $conditionPostMaxView = [
            'ignore' => array_merge($posts_in_topic->pluck('id')->toArray(), array_merge($post_new->pluck('id')->toArray(), [ $post->id ])),
            'orderby' => [ 'field' => 'view', 'type' => 'DESC' ],
            'public' => 1
        ];
        $postMaxView = $postModel->getPostByCondition($conditionPostMaxView)->take( 6 )->get();
        
        return view('client.post-view', compact('post', 'tags', 'topic', 'rateAuthor', 'postMaxView', 'post_new','posts_in_topic'));
    }
}

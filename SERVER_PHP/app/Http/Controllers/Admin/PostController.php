<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\SupportJson;
use App\Helpers\SupportString;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_POST;
use App\Helpers\Catalogue;
use App\Models\Post;
use App\Models\PostTagActive;
use App\Models\Topic;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){

        /// check edit or insert
        if( !$id ){
            /// thêm mới
            $post    = new Post();
            $tags_id = 0;
        }else{
            //// edit 
            $post    = (new Post())->find($id);
            $tags_id = (new PostTagActive())->where('post_id', $id)->pluck('tag_id');
            if( !$post ){
                //// redirect 404
                return abort(404);
            }
        }
        
        return view('admin.post.save', compact([ 'tags_id', 'post' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_POST $request, $id = 0){

        ///setting data insert table post
        $postInput = $request->only(
            'topic_id', 'rating_show', 'rating_id', 'rate_value', 'title', 'slug', 
            'excerpt', 'content', 'background', 'thumbnail', 'public', 
            'site_name', 'howto', 'showto', 'image', 'description', 
            'type', 'stylesheet', 'javascript');

        $postInput['user_id'] = Auth::user()->id;
        $postInput['content'] = SupportString::createEmoji($postInput['content']);

        /// create catalogue
                   $catalogue        = Catalogue::generate($postInput['content']);
        $postInput['content']        = $catalogue->text;
        $postInput['text_content']   = strip_tags($postInput['content']);

        $postInput['catalogue']      = $catalogue->catalogue;
        $postInput['text_catalogue'] = $catalogue->text_catalogue;

        /// if description null get of catalogue || content
        if(!trim($postInput['description'])){

            $description = $postInput['text_catalogue'];
            if( !trim($description) ){

                $description = mb_substr( $postInput['text_content'], 0, 160);
            }
            $postInput['description'] = html_entity_decode(trim($description));
        }

        /// if howto-json null => render new 
        if(!trim($postInput['howto'])){

            $postInput['ldjson'] = [
                'showto' => $postInput['showto'],
                'howto' => SupportJson::createJsonHowTo(
                    Route('POST_VIEW', ['slug' => $postInput['slug']]),
                    $postInput['title'],
                    $postInput['description'],
                    $postInput['content'],
                    $postInput['image']
                )
            ];
        }else{

            $postInput['ldjson'] = [
                'showto' => $postInput['showto'],
                'howto'  => json_decode($postInput['howto'])
            ];
        }
        unset($postInput['howto']);
        unset($postInput['showto']);

        /// create style
        $postInput['stylesheet'] = SupportString::minimizeCSSsimple($postInput['stylesheet']);
        /// create javascript
        $postInput['javascript'] = SupportString::minimizeJavascriptSimple($postInput['javascript']);
        /// set id save post 
        $postInput['id'] = $id;
        
        try{
            if( !$id && $this->checkSlugExist( $postInput['slug'] )){
                
                throw new Exception('thêm mới nhưng slug đã tồn tại');
            }
            /// create instance Post Model 
            $post          = new PostEloquentRepository();
            $postTagActive = new PostTagActiveEloquentRepository();

            $post->save($postInput);

            $postId = $post->getModelInstance()->id;
            /// save tag of post 
            $postTagActive->removeByPostId($postId);

            $tagsInput      = $request->tag_id;
            if( $tagsInput ){
                $tagsDataInsert = array_map( 
                    function( $tag ) use ( $postId ){ 
                        return  ['post_id' => $postId, 'tag_id' => $tag ]; 
                    }, $tagsInput
                );
                $postTagActive->insert($tagsDataInsert);
            }

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_POST',  ['id' => $postId]);

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'đã có lỗi: '.$e->getMessage())
            ->withInput($request->all());
        }
    }

    /**
     * Show all row of component
     *
     * @return View
     */
    public function load(Request $request){
        $limit      = Config::get('constant.LIMIT');
        $user_id    = Auth::user()->id;
        $postModel  = new Post();
        $topicModel = new Topic();


        $user_id    = Auth::user()->id;

        $condition = [
            'orderby' => [ 'field' => 'id', 'type' => 'DESC' ]
        ];

        $topics     = $topicModel->getTopicByCondition([])->get();

        $query      = $request->all('topic', 'post');

        

        if($query['topic']){
            
            $condition['topic'] = $query['topic'];
        }

        if($query['post']){

            $condition['post'] = SupportString::createSlug($query['post']);
        }

        $posts = $postModel->getPostByCondition($condition)->paginate( $limit )->appends(request()->query());
        return view('admin.post.load', compact(['posts', 'query', 'topics']));
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        //// detail component
    }
    
    /**
     * Delete 1 post
     *
     * @param  int  $id
     * @return View
     */
    public function delete($id = 0){

        (new PostEloquentRepository())->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
    /**
     * Delete 1 post
     *
     * @param  int  $id
     * @return View
     */
    public function update($id = 0, Request $request){

        $status  = 200;
        $message = 'success';
        $query   = $request->all([ 'sort' ]);
        try {
            $post = (new PostEloquentRepository())->find($id);
            /// set value
            $post->sort = (int)$query['sort'];
            //// save data
            $post->save();
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            $status = 500;
        }
        $response = array( 'status' => $status, 'message' => $message );
        return response()->json( $response, $status);
    }
}

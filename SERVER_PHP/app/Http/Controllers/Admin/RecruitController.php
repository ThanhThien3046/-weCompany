<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\SupportJson;
use App\Helpers\SupportString;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_POST;
use App\Helpers\Catalogue;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_BRANCH;
use App\Models\Branch;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\PostTagActive;
use App\Models\Recruit;
use App\Models\Topic;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RecruitController extends Controller
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
            $recruit    = new Recruit();
        }else{
            //// edit 
            $recruit    = (new Recruit())->find($id);
            if( !$recruit ){
                //// redirect 404
                return abort(404);
            }
        }
        $branchs = (new Branch())->all();
        // $galleries = DB::table('galleries')->where('foreign', $recruit->id)->where('type', Config::get('constant.TYPE-GALLERY.POST'))->get();
        // if( $galleries->isEmpty() ){
        //     $galleries = [
        //         new Gallery()
        //     ];
        // }
        return view('admin.recruit.save', compact([ 'branchs', 'recruit']));
    }


    public function save(ADMIN_VALIDATE_SAVE_POST $request, $id = 0){

        ///setting data insert table recruit
        ///doan nay luu vao DB chua duoc
        $recruitInput = $request->only( 'branch_id', 'title','content');
        $add = DB::insert('insert into recruit (title, content, branch_id) 
        values (?,?,?)',[$recruitInput['branch_id'],$recruitInput['title'],$recruitInput['content']]);
        return redirect()->route('ADMIN_SAVE_RECRUIT',  ['recruit_id' => (new Recruit())->recruit_id]);
    }
        // try{
        //     $postInput['user_id'] = Auth::user()->id;
        //     $postInput['content'] = SupportString::createEmoji($postInput['content']);
                
            
        //     /// create catalogue
        //             $catalogue        = Catalogue::generate($postInput['content']);
        //     $postInput['content']        = $catalogue->text;
        //     $postInput['text_content']   = strip_tags($postInput['content']);

        //     $postInput['catalogue']      = $catalogue->catalogue;
        //     $postInput['text_catalogue'] = $catalogue->text_catalogue;

        //     /// if description null get of catalogue || content
        //     if(!trim($postInput['description'])){

        //         $description = $postInput['text_catalogue'];
        //         if( !trim($description) ){

        //             $description = mb_substr( $postInput['text_content'], 0, 160);
        //         }
        //         $postInput['description'] = html_entity_decode(trim($description));
        //     }
            
            /// set id save post 
            // $recruitInput['id'] = $id;
            
        
            /// create instance Post Model 
            // $post          = new Post();
            // // $postTagActive = new PostTagActive();
            // if( $id ){
            //     $post = (new Post())->find($id);
            //     $post->update($postInput);
            // }else{
            //     $post = new Post();
            //     $post = $post->create($postInput);
            // }
            
            /// save tag of post 
            // $postTagActive->removeByPostId($postId);

            // $tagsInput      = $request->tag_id;
            // if( $tagsInput ){
            //     $tagsDataInsert = array_map( 
            //         function( $tag ) use ( $postId ){ 
            //             return  ['post_id' => $postId, 'tag_id' => $tag ]; 
            //         }, $tagsInput
            //     );
            //     $postTagActive->insert($tagsDataInsert);
            // }
            
            /// remove gallery
            // (new Recruit())->where("foreign", $post->id)->delete();
            /// insert 
            // $images = $request->input('gallery');
            // $images = array_filter($images, function( $item ) {  return $item; });

    //         if( count($images) ){
    //             $recruitId = $recruit->id;
    //             if( $images ){
    //                 $imgsDataInsert = array_map( 
    //                     function( $url ) use ( $recruit ){ 
    //                         return  ['foreign' => $recruit, 'url' => $url, 'type' => Config::get('constant.TYPE-GALLERY.POST') ]; 
    //                     }, $images
    //                 );
    //                 $galleries = (new Gallery())->insert($imgsDataInsert);
    //             }
    //         }

    //         $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
    //         return redirect()->route('ADMIN_STORE_POST',  ['id' => $post->id]);

    //     }catch (\Exception $e){
    //         dd ($e->getMessage());
    //         return redirect()->back()
    //         ->with(Config::get('constant.SAVE_ERROR'), 'đã có lỗi: '.$e->getMessage())
    //         ->withInput($request->all());
    //     }
    // }
        
    
    /**
     * Show all row of component
     *
     * @return View
     */
    public function load(Request $request){
        $limit       = Config::get('constant.LIMIT');
        $user_id     = Auth::user()->id;
        $postModel   = new Post();
        $branchModel = new Branch();


        $user_id    = Auth::user()->id;

        $condition = [
            'orderby' => [ 'field' => 'id', 'type' => 'DESC' ]
        ];

        $branchs     = $branchModel->all();

        $query      = $request->all('branch', 'post');

        
        $postFilter = $postModel->orderBy('id', 'DESC');

        if($query['branch']){
            
            $postFilter->where('branch_id', $query['branch']);
        }

        if($query['post']){

            $postFilter->where('title', 'like', '%' . $query['post'] . '%');
        }

        $posts = $postFilter->paginate( $limit )->appends(request()->query());
        return view('admin.post.load', compact(['posts', 'query', 'branchs']));
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

        (new Post())->find($id)->delete();

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
            $post = (new Post())->find($id);
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

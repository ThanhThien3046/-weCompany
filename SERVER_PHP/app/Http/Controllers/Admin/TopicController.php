<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_TOPIC;
use App\Helpers\Catalogue;
use App\Repositories\Topic\TopicEloquentRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

class TopicController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){
        
        $topicModel = new TopicEloquentRepository();
        if( !$id ){
            /// thêm mới
            $topic    = $topicModel->getInstanceEmpty();
        }else{
            //// edit 
            $topic    = $topicModel->find($id);
            if( !$topic ){
                //// redirect 404
                return abort(404);
            }
        }
        
        return view('admin.topic.save', compact([ 'topic' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_TOPIC $request, $id = 0){

        ///setting data insert table topic

        $topicInput = $request->only( 'title', 'slug', 'excerpt', 
        'content', 'background', 'thumbnail', 'site_name',
        'image', 'description');

        /// create catalogue
                    $catalogue = Catalogue::generate($topicInput['content']);
        $topicInput['content'] = $catalogue->text;

        $topicInput['catalogue']    = $catalogue->catalogue;
                    $text_catalogue = $catalogue->text_catalogue;

        /// if description_seo null get of catalogue || content
        if(!trim($topicInput['description'])){

            $description = $text_catalogue;
            if( !trim($description) ){

                $description = mb_substr( strip_tags($topicInput['content']), 0, 160);
            }
            $topicInput['description'] = html_entity_decode(trim($description));
        }

        /// set id save topic 
        $topicInput['id'] = $id;
        
        try{
            if( !$id && $this->checkSlugExist( $topicInput['slug'] )){
                
                throw new Exception('thêm mới nhưng slug đã tồn tại');
            }
            /// create instance Topic Model 
            $topic = new TopicEloquentRepository();

            $topic->save($topicInput);
            $topicID = $topic->getModelInstance()->id;

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_TOPIC',  ['id' => $topicID ]);

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
    public function load(){
        $limit      = 10;
        $topicModel = new TopicEloquentRepository();
        $topics     = $topicModel->paginate( $limit );
        return view('admin.topic.load', compact(['topics']));
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
     * Delete 1 topic
     *
     * @param  int  $id
     * @return View
     */
    public function delete($id = 0){

        $topicModel = new TopicEloquentRepository();
        $topicModel->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

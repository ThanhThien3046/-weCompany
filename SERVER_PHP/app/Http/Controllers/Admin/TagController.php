<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_TAG;
use App\Helpers\Catalogue;
use App\Repositories\Tag\TagEloquentRepository;
use App\Repositories\User\UserEloquentRepository;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

class TagController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){
        
        $tagModel = new TagEloquentRepository();
        if( !$id ){
            /// thêm mới
            $tag    = $tagModel->getInstanceEmpty();
        }else{
            //// edit 
            $tag    = $tagModel->find($id);
            if( !$tag ){
                //// redirect 404
                return abort(404);
            }
        }
        
        return view('admin.tag.save', compact([ 'tag' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_TAG $request, $id = 0){

        ///setting data insert table tag
        $tagInput = $request->only( 'title', 'slug', 'excerpt', 
        'content', 'background', 'thumbnail', 'site_name',
        'image', 'description');
        
        /// create catalogue
        $catalogue = Catalogue::generate($tagInput['content']);
        
        $tagInput['content']      = $catalogue->text;
        $tagInput['catalogue']    = $catalogue->catalogue;
                  $text_catalogue = $catalogue->text_catalogue;

        /// if description_seo null get of catalogue || content
        if(!trim($tagInput['description'])){

            $description = $text_catalogue;
            if( !trim($description) ){

                $description = mb_substr( strip_tags($tagInput['content']), 0, 160);
            }
            $tagInput['description'] = html_entity_decode(trim($description));
        }


        /// set id save tag 
        $tagInput['id'] = $id;
        
        try{
            if( !$id && $this->checkSlugExist( $tagInput['slug'] )){
                
                throw new Exception('thêm mới nhưng slug đã tồn tại');
            }
            /// create instance Tag Model 
            $tag = new TagEloquentRepository();

            $tag->save($tagInput);
            $tagID = $tag->getModelInstance()->id;

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_TAG',  ['id' => $tagID ]);

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
        $limit = 10;
        $tags = (new TagEloquentRepository())->paginate( $limit );
        return view('admin.tag.load', compact(['tags']));
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
     * Delete 1 tag
     *
     * @param  int  $id
     * @return View
     */
    public function delete($id = 0){

        (new TagEloquentRepository())->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

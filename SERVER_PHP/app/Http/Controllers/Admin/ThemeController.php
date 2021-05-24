<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Catalogue;
use App\Helpers\SupportString;
use App\Http\Controllers\Controller;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_THEME;
use App\Repositories\TagTheme\TagThemeEloquentRepository;
use App\Repositories\TagThemeActive\TagThemeActiveEloquentRepository;
use App\Repositories\Theme\ThemeEloquentRepository;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
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
            $theme    = (new ThemeEloquentRepository())->getInstanceEmpty();
            $tags_id = 0;
        }else{
            //// edit 
            $theme    = (new ThemeEloquentRepository())
            ->getThemeById($id, ['*']);
            $tags_id = (new TagThemeActiveEloquentRepository())->getByTheme($id);
            if( !$theme ){
                //// redirect 404
                return abort(404);
            }
        }
        $TAGS_THEME = (new TagThemeEloquentRepository())->getAll();
        return view('admin.theme.save', compact([ 'tags_id', 'theme', 'TAGS_THEME' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_THEME $request, $id = 0){

        ///setting data insert table post
        $themeInput = $request->only(
            'title', 'slug', 'price', 'author', 'url',
            'excerpt', 'introduce', 'content', 'background', 'thumbnail',
            'image_laptop', 'image_tablet', 'image_mobile',
            'site_name', 'image', 'description');

        $themeInput['content'] = SupportString::createEmoji($themeInput['content']);

        /// create catalogue
                    $catalogue      = Catalogue::generate($themeInput['content']);
        $themeInput['content']      = $catalogue->text;
        $themeInput['text_content'] = strip_tags($themeInput['content']);

        $themeInput['catalogue']      = $catalogue->catalogue;
        $themeInput['text_catalogue'] = $catalogue->text_catalogue;

        /// if description null get of catalogue || content
        if(!trim($themeInput['description'])){

            $description = $themeInput['text_catalogue'];
            if( !trim($description) ){

                $description = mb_substr( $themeInput['text_content'], 0, 160);
            }
            $themeInput['description'] = html_entity_decode(trim($description));
        }

        /// set id save post 
        $themeInput['id'] = $id;
        
        try{
            if( !$id && $this->checkSlugExist( $themeInput['slug'] )){
                
                throw new Exception('thêm mới nhưng slug đã tồn tại');
            }
            /// create instance Post Model 
            $theme          = new ThemeEloquentRepository();
            $tagThemeActive = new TagThemeActiveEloquentRepository();

            $theme->save($themeInput);

            $themeId = $theme->getModelInstance()->id;
            /// save tag of post 
            $tagThemeActive->removeByThemeId($themeId);

            $tagsInput      = $request->tag_id;
            if( $tagsInput ){
                $tagsDataInsert = array_map( 
                    function( $tag ) use ( $themeId ){ 
                        return  ['theme_id' => $themeId, 'tag_theme_id' => $tag ]; 
                    }, $tagsInput
                );
                $tagThemeActive->insert($tagsDataInsert);
            }

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_THEME',  ['id' => $themeId]);

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
        $limit         = Config::get('constant.LIMIT');
        $user_id       = Auth::user()->id;
        $ThemeModel    = new ThemeEloquentRepository();
        $tagThemeModel = new TagThemeEloquentRepository();

        $condition = [
            'orderby' => [ 'field' => 'id', 'type' => 'DESC' ]
        ];

        $tags_theme     = $tagThemeModel->getAll();

        $query      = $request->all('tag_theme', 'theme');

        if($query['tag_theme']){
            
            $condition['tag_theme'] = $query['tag_theme'];
        }

        if($query['theme']){

            $condition['theme'] = SupportString::createSlug($query['theme']);
        }

        $themes = $ThemeModel->getThemeByCondition($condition)->paginate( $limit )->appends(request()->query());
        return view('admin.theme.load', compact(['themes', 'query', 'tags_theme']));
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

        (new ThemeEloquentRepository())->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\Catalogue;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_BRANCH;
use App\Models\Branch;
use App\Models\Histories;
use Aws\History;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){
        
        if( !$id ){
            /// thêm mới
            
            $branch    = new Branch();
            $histories = new Histories();
        }else{
            //// edit 
            $branch    = (new Branch())->find($id);
        }

        $branchs = (new Branch())->all();
        $histories = DB::table('histories')->where('branch_id', $branch->id)->get();
        
        if( $histories->isEmpty() ){
            $histories = [
                new Histories()
            ];
        }
        
        return view('admin.branch.save', compact([ 'branch','histories' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_BRANCH $request, $id = 0){

        ///setting data insert table branch, histories

        $branchInput = $request->only( 'title', 'excerpt', 'content', 'banner', 'image', 'background',
        'description', 'title_recruit', 'color','company_name','address','phone','fax','time','fund','employnum');
 
        // dd($history);
        // /// create catalogue
        //             $catalogue = Catalogue::generate($branchInput['content']);
        // $branchInput['content'] = $catalogue->text;

        // $branchInput['catalogue']    = $catalogue->catalogue;
        //             $text_catalogue = $catalogue->text_catalogue;

        /// if description_seo null get of catalogue || content
        // if(!trim($branchInput['description'])){

        //     $description = '';// $text_catalogue;
        //     if( !trim($description) ){

        //         $description = mb_substr( strip_tags($branchInput['content']), 0, 160);
        //     }
        //     $branchInput['description'] = html_entity_decode(trim($description));
        // }

        /// set id save topic 
        $branchInput['id'] = $id;
        
        try{
            /// create instance Branch Model 
            
            if( $id ){
                $branch = (new Branch())->find($id);
                $branch->update($branchInput);
                
            }else{
                $branch = new Branch();
                $branch = $branch->create($branchInput);
            }

             /// remove gallery
             (new Histories())->where("branch_id", $branch->id)->delete();
            // Insert

            $historyInput = $request->input('history');
            $historyInput = array_filter($historyInput, function( $item ) {  return $item; });
            // dd(count($historyInput));

            if( count($historyInput) ){
                $branchId = $branch->id;
                if( $historyInput){
                    $DataInsert = array_map( 
                        function( $historyInput ) use ($branchId){ 
                            return  ['content'=>$historyInput,'branch_id' => $branchId ]; 
                        }, $historyInput
                    );
                    $histories = (new Histories())->insert($DataInsert);
                }
            }

            // End Insert
       
            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_BRANCH',  ['id' => $branch->id ]);

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
        $limit       = 10;
        $branchModel = new Branch();
        $branchs     = $branchModel->orderBy('id', 'DESC')
                        ->paginate( $limit );
        return view('admin.branch.load', compact(['branchs']));
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

        $branchModel = new Branch();
        $branchModel->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

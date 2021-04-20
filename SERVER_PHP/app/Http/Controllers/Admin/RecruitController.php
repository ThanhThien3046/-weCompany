<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_RECRUIT;
use App\Models\Recruit;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use recruits;

class RecruitController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){
        
        if( !$id ){
            /// thêm mới
            $recruit    = new Recruit();
        }else{
            //// edit 
            $recruit    = (new Recruit())->find($id);
        }
        $branchs = DB::table('branchs')->get();
        return view('admin.recruit.save', compact([ 'recruit', 'branchs']));
    }


    public function save(ADMIN_VALIDATE_SAVE_RECRUIT $request, $id = 0){

        ///setting data insert table topic

        $recruitInput = $request->only( 'title', 'content', 'branch_id');
        /// set id save topic 
        $recruitInput['id'] = $id;
        
        try{
            /// create instance Branch Model 
            
            if( $id ){
                $recruit = (new Recruit())->find($id);
                $recruit->update($recruitInput);
                
            }else{
                $recruit = new Recruit();
                $recruit = $recruit->create($recruitInput);
            }

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_RECRUIT',  ['id' => $recruit->id ]);

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
        $limit        = 10;
        $recruitModel = new Recruit();
        $recruits     = $recruitModel->orderBy('id', 'DESC')
                        ->paginate( $limit );
        return view('admin.recruit.load', compact(['recruits']));
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

        $recruitModel = new Recruit();
        $recruitModel->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }
}

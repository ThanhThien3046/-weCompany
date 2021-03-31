<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ADMIN_VALIDATE_SAVE_USER;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index( $id = 0 ){

        if( !$id ){
            /// thêm mới
            $user    = $this->model->createUserModel()->getInstanceEmpty();
        }else{
            //// edit 
            $user    = $this->model->createUserModel()->find($id);
            if( !$user ){
                //// redirect 404
                return abort(404);
            }
        }
        $roles = $this->model->createRoleModel()->getAll();
        
        return view('admin.user.save', compact([ 'user', 'roles' ]));
    }


    public function save(ADMIN_VALIDATE_SAVE_USER $request, $id = 0){

        ///setting data insert table topic

        $userInput = $request->only( 'name', 'email', 'avatar', 'contact', 'password', 'role_id' );

        /// set id save topic 
        $userInput['id'] = $id;
        
        
        try{
            {
                
            }
            if($id){

                unset($userInput['password']);
            }else if(!trim($userInput['password'])){

                throw new Exception('thêm mới nhưng password quá ngắn');
            }else{
                
                $userInput['password'] = bcrypt($userInput['password']);
            }
            

            if( !$id && $this->checkSlugExist( $userInput['email'] )){
                
                throw new Exception('thêm mới nhưng email đã tồn tại');
            }
            /// create instance Topic Model 
            $user = $this->model->createUserModel();

            $user->save($userInput);
            $userModel = $user->getModelInstance();
            $userID = $userModel->id;

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_USER',  ['id' => $userID ]);

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
        $users = $this->model->createUserModel()->paginate( $limit );
        return view('admin.user.load', compact(['users']));
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id = 1)
    {
        //// detail component
        $limit = 100;
        $user            = $this->model->createUserModel()->find($id);
        return view('admin.user.load-permission', compact([ 'user' ]));
    }
    
    /**
     * Delete 1 topic
     *
     * @param  int  $id
     * @return View
     */
    public function delete($id = 0){

        $this->model->createUserModel()->find($id)->delete();

        $status = 200;
        $response = array( 'status' => $status, 'message' => 'success' );
        return response()->json( $response );
    }

}

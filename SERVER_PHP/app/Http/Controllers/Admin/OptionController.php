<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Option\OptionEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class OptionController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index(){

        $options  = (new OptionEloquentRepository())->getAll();
        return view('admin.option.save', compact([ 'options' ]));
    }


    public function store(Request $request){

        ///setting data insert table post
        $optionInput = $request->only('key', 'type', 'value_text', 'value_html');
        
        try{
            /// create instance Post Model 
            $option = new OptionEloquentRepository();
            $option->truncate();

            $optionInputs = [];
            for ($i=0; $i < count($optionInput['key']); $i++) { 
                
                $optionInputs[] = [
                    'key' => trim($optionInput['key'][$i]),
                    'type' => $optionInput['type'][$i],
                    'value_text' => $optionInput['value_text'][$i],
                    'value_html' => $optionInput['value_html'][$i]
                ];
            }
            $option->insert($optionInputs);
            

            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('ADMIN_STORE_OPTION');

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'đã có lỗi: '.$e->getMessage())
            ->withInput($request->all());
        }
    }
}

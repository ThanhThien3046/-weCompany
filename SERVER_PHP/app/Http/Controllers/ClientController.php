<?php

namespace App\Http\Controllers;

use App\Http\Requests\CLIENT_VALIDATE_CONTACT;
use App\Mail\MailContact;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * CLIENT HOME PAGE
     */
    public function index(){

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

        $input = $request->only(
            'first_name', 'last_name' ,'email', 'mobile', 'fax',
            'job_name', 'company', "message");
        $input['email'] = trim($input['email']);

        try{
            
            /// save db
            Contact::create($input);
            
            Mail::to(trim($input['email']))->send(new MailContact($input));
            if (Mail::failures()) {
                throw new Exception('send mail not working');
            }
            Mail::to(trim(env('MAIL_TO_ADMIN', 'thanhthien3046@gmail.com')))->send(new MailContact($input));
            if (Mail::failures()) {
                throw new Exception('send mail admin not working');
            }
            
            $request->session()->flash(Config::get('constant.SAVE_SUCCESS'), true);
            return redirect()->route('CONTACT_PAGE');

        }catch (\Exception $e){
            return redirect()->back()
            ->with(Config::get('constant.SAVE_ERROR'), 'Error: '.$e->getMessage())
            ->withInput($request->all());
        }
    }

    
}

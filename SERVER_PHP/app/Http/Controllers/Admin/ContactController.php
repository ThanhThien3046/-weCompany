<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ContactController extends Controller
{
    /**
     * Show form save data of component ( insert or edit )
     *
     * @return View
     */
    public function index(Request $request, $id){

        $contact = Contact::find($id);
        if( !$contact ){
            return abort(404);
        }
        if( $contact->read != Config::get('constant.CONTACT_ADMIN_READ') ){

            $contact->read = Config::get('constant.CONTACT_ADMIN_READ');
            $contact->save();
        }
        
        return view('admin.contact.detail', compact([ 'id', 'contact' ]));
    }
}

<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function addContactInfo(){
        $contacts = Contact::all();
        return view('admin.contact.edit-contact',['contacts'=>$contacts]);
    }

    public function updateContactInfo(Request $request){
        $contactById = Contact::find($request->contact_id);
        $contactById->email = $request->email;
        $contactById->mobile = $request->mobile;
        $contactById->fb = $request->fb;
        $contactById->tw = $request->tw;
        $contactById->ln = $request->ln;
        $contactById->gp = $request->gp;
        $contactById->google_map = $request->google_map;
        $contactById->reserved_by = $request->reserved_by;
        $contactById->save();
        return redirect('add-contact')->with('Contact Information Updated Successfully');
    }
}

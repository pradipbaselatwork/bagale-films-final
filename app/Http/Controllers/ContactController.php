<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
      
           $data = $request->all();
            $contacts = new Contact;
            $contacts->name = $data['name'];
            $contacts->phone = $data['phone'];
            $contacts->email = $data['email'];
            $contacts->description = $data['description'];
            $contacts->save();
            return redirect()->back();
    }
}

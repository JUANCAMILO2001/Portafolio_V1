<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\contact\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('admin.contacts.index',compact('contacts'));
    }
}

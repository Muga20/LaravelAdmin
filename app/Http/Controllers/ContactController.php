<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

class ContactController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth')->except(['index', 'show']);
    }


    public function showMessages( ){


        $data = Auth::user();

        $contacts = Contact::latest()->paginate(5);

        return view('admin.contact.show', compact( 'contacts' ,'data'));

    }



    public function contact( ){

        $data = Auth::user();

        $categories = Category::latest()->paginate(4);

        return view('client.contact', compact('data' ,'categories'));
    }





    public function storeMessages (Request $request){
        
       $request->validate([
           'name' => 'required',
           'email' => 'required',
           'subject' => 'required',
           'message' => 'required',
          
       ]);
       
         $contact = new Contact();

            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;

            // dd($contact);

            $contact->save();

            return redirect()->back()->with('status', 'Message Send Successfully');
    }

       
 
 
   
    public function deleteMessages(Contact $contact){
        $contact->delete();
        return redirect()->back()->with('status', 'Post Delete Successfully');
    }
}

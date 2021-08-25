<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //
    public function AdminContact(){
        
        $contacts = Contact::latest()->get();

        return view('admin.contact.index', compact('contacts'));
    }


    public function AddAdminContact(){
        
        
        return view('admin.contact.create');
    }


    public function StoreContact(Request $request){

        $request->validate([
            'location'=>'required|min:4',
            'email'=>'required|email',
            'phone'=>'required|min:11',
        ]
        
        );


        Contact::insert([
            'location'=>$request->location,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success','Contact inserted successfully');
    }

    public function Edit($id){

        $contact = Contact::find($id);

        return view('admin.contact.edit', compact('contact'));

    }

    public function Update(Request $request, $id){
        
        $request->validate([
            'location'=>'required|min:4',
            'email'=>'required|email',
            'phone'=>'required|min:11',
        ]);

        Contact::find($id)->update([
            'location'=>$request->location,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success','Contact updated successfully');
    }

    public function Delete($id){
        Contact::find($id)->delete();

        return Redirect()->route('admin.contact')->with('success', 'Contact deleted successfully');
    }


    public function Contact(){

        $contact = Contact::first();

        return view('pages.contact', compact('contact'));
    }

    public function ContactMessageSubmit(Request $request){
      
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',

        ]);

        ContactMessage::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);


        return redirect()->route('contact')->with('success','Your message has been sent. Thank you!');
    }


    public function Messages(){
        $contact_messages = ContactMessage::latest()->get();

        return view('admin.contact.messages', compact('contact_messages'));
    }
}

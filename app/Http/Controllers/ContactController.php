<?php

namespace App\Http\Controllers;

use App\Models\logo;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ContactMessege;
use App\Models\TopMenuSetting;

class ContactController extends Controller
{

    public function contact(){

        return view('frontend.contact.contact',[
            'info'=> TopMenuSetting::first(),
            'number' =>logo::first(),
        ]);
    }
    public function contact_messege(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'service' => 'required',

            'phone'=>'required',
            'message'=>'required',
        ]);

        // Handle the file upload


        // Create a new MainCategory instance and save it to the database
     $messege = new ContactMessage();
     $messege->name = $request->name;
     $messege->email = $request->email;
     $messege->phone = $request->phone;
     $messege->service = $request->service;
     $messege->message= $request->message;
     $messege->save();

        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('success', 'Messege  send successfully!');
    }
}
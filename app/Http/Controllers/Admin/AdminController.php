<?php

namespace App\Http\Controllers\Admin;

use App\Models\logo;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\ContactMessege;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.home.home',[
            'sales'=> OrderTable::where('status', 'delivered')->sum('total'),
            'logo'=>logo::first(),
            'messeges'=>ContactMessage::get(),
        ]);
    }
}

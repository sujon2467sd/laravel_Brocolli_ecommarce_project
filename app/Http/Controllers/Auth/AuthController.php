<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            $type = Auth()->user()->usertype;
            if ($type == 'user') {
                return redirect()->route('my.account')->with('success', 'login successfully.');;
            }elseif ($type == 'admin') {
                return view('admin.home.home');
            }else {
                return redirect()->back()->with('error', 'You are not authorized to access this page.');
            }
        } else {
            return redirect()->back()->with('error', 'You must be logged in to access this page.');
        }
    }
}
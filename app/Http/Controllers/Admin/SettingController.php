<?php

namespace App\Http\Controllers\Admin;

use App\Models\logo;
use Illuminate\Http\Request;
use App\Models\TopMenuSetting;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function  general_setting(){




        return view('admin.setting.generalsetting',[
            'settings'=> TopMenuSetting::first(),
            'logos'=>logo::first(),

        ]);}
}

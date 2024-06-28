<?php

namespace App\Http\Controllers\Admin;

use App\Models\logo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoController extends Controller
{

    public function logo_update(Request $request)
    {
        // Retrieve the first row from the logos table
        $logo = logo::first();

        $img_name = '';
        $favicon_img = '';

        // logo img

        if ($request->hasFile('logo_img')) {
            $logo_img = $request->file('logo_img');
            $img_name= time() . '.' .  $logo_img->getClientOriginalExtension();
            // Move the file to the desired location
            $logo_img->move(public_path('admin/logo_images'),  $img_name);
            $logo->logo_img= $img_name;
        }else{
            $img_name=$logo->logo_img;
        }


        // favicon img

        if ($request->hasFile('favicon_img')) {
            $favi_img = $request->file('favicon_img');
            $favicon_img= time() . '.' .  $favi_img->getClientOriginalExtension();
            // Move the file to the desired location
            $favi_img->move(public_path('admin/logo_images'),   $favicon_img);

            $logo->favicon_img=$favicon_img;
        }else{
            $favicon_img=$logo->favicon_img;
        }

        $logo->phone_number = $request->input('number');
        $logo->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Logo data updated successfully!');
    }




}

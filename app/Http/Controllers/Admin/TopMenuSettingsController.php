<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\TopMenuSetting;
use App\Http\Controllers\Controller;

class TopMenuSettingsController extends Controller
{


    public function top_update(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'gmail' => 'required',
            'address' => 'required|min:3|max:50',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

        // Update top menu settings in the database
        $settings = TopMenuSetting::first();
        $settings->update($validatedData);

        return redirect()->back()->with('success', 'Top menu settings updated successfully!');
    }

}
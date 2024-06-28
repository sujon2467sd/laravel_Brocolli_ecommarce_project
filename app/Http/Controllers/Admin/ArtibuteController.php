<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artibute;
use App\Models\ArtibuteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtibuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.artibute.artibute_setting',[
            'artibute'=>Artibute::get(),
        ]);
    }

    public function artibute_status($id){


        $getstatus=Artibute::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Artibute::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Artibute  Status change successfully!');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',

        ]);

     $brand = new Artibute();
        $brand->name = $request->name;
        $brand->status= $request->status;
        $brand->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'Artibute  created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

         return view('admin.artibute.artibute_setting_edit',[

            'artibutes'=> Artibute::findOrFail($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $Artibute=Artibute::findOrFail($id);
        // return $request;

        // Update the main category data
         $Artibute->update([
            'name' => $request->name,
            'status' => $request->status,

        ]);

        return redirect()->route('artibute.index')->with('success', 'Artibute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artibute=Artibute::findOrfail($id);


            $artibute->delete();
            return redirect()->back()->with('delete_success', 'Artibute deleted successfully!');
    }
}

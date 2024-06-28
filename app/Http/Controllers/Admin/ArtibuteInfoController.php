<?php

namespace App\Http\Controllers\Admin;

use App\Models\Artibute;
use App\Models\ArtibuteInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtibuteInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.artibute.artibute_info',[
            'artibute'=>Artibute::get(),
             'artibute_info'=>ArtibuteInfo::with('Artibute')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function getArtibuteInfo(Request $request){
        $ArtibuteInfoId = $request->input('ArtibuteInfoId');
        $artibuteinfo = ArtibuteInfo::where('artibute_id', $ArtibuteInfoId)->get();
        return response()->json(['artibuteinfo' => $artibuteinfo]);
    }

    public function artibute_info_status($id){

        $getstatus=ArtibuteInfo::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

        ArtibuteInfo::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Artibute Status change successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                             // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'artibute_id' => 'required',
        'status' => 'required',

    ]);

    // Create a new MainCategory instance and save it to the database
  $artibute_info = new ArtibuteInfo();

  $artibute_info->artibute_id= $request->artibute_id;
  $artibute_info->name = $request->name;
  $artibute_info->status= $request->status;
  $artibute_info->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'ArtibuteInfo  created successfully!');
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
        return view('admin.artibute.artibute_info_edit',[
            'artibute_info'=>ArtibuteInfo::find($id),
            'artibute'=>Artibute::get(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $Artibute=ArtibuteInfo::findOrFail($id);
        // return $request;

        // Update the main category data
         $Artibute->update([
            'name' => $request->name,
            'artibute_id' => $request->artibute_id,
            'status' => $request->status,

        ]);

        return redirect()->route('artibute-info.index')->with('success', 'ArtibuteInfo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artibute_info=ArtibuteInfo::findOrfail($id);



        $artibute_info->delete();
        return redirect()->back()->with('delete_success', 'Artibute deleted successfully!');
    }

}
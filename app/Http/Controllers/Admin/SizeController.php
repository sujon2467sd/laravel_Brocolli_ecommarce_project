<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.size',[
            'size'=>Size::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function size_status($id){

        $getstatus=Size::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Size::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Size Status change successfully!');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'size' => 'required',
        'description' => 'required|string',
        'status' => 'required',
         // Assuming you want to validate the image
    ]);


    // Create a new MainCategory instance and save it to the database
   $size = new Size();
   $size->name = $request->name;
    $size->size= $request->size;
   $size->description = $request->description;
    $size->status= $request->status;
   $size->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'size  created successfully!');
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
        return view('admin.size.size_edit',[

            'size'=> Size::findOrFail($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Size=Size::findOrFail($id);

        // Update the main category data
        $Size->update([
            'name' => $request->name,
            'size' => $request->size,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('size.index')->with('success', 'size updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Size=Size::findOrfail($id);


            $Size->delete();
            return redirect()->back()->with('delete_success', 'size deleted successfully!');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.about',[
            'abouts'=>About::get(),
        ]);
    }

    public function about_status($id){

        $getstatus=About::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         About::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Brand  Status change successfully!');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
                 // Assuming you want to validate the image
        ]);



        // Create a new MainCategory instance and save it to the database
       $about = new About();
       $about->name = $request->name;
       $about->description = $request->description;
       $about->status= $request->status;
       $about->save();


        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('success', 'About  created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $About=About::findOrFail($id);
        // return $request;



        // Update the main category data
        $About->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
           
        ]);

        return redirect()->back()->with('success', 'About updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about=About::findOrfail($id);
        $about->delete();
        return redirect()->back()->with('delete_success', 'brand deleted successfully!');


    }
}

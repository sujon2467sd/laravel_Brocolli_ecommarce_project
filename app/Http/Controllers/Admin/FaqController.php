<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function faq_status($id){

        $getstatus=Faq::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Faq::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'faq  Status change successfully!');

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.faq',[
           'faqs'=>Faq::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                             // Validate the form data
     $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required',
        // Assuming you want to validate the image
    ]);

    // Handle the file upload


    // Create a new MainCategory instance and save it to the database
   $faq = new Faq();
   $faq->name = $request->name;

   $faq->description = $request->description;
   $faq->status= $request->status;
       // Assuming 'cate_img' is the column where you store the image file name
   $faq->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'faq created successfully!');
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
            $faq=Faq::findOrFail($id);
            return view('admin.faq.faq_edit',[
                'faq'=>$faq,
            ]);
  }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $faq=Faq::findOrFail($id);
        // return $request;


        // Update the main category data
        $faq->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,

        ]);

        return redirect()->route('faq.create')->with('success', 'faq updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq=Faq::findOrFail($id);
         $faq->delete();
         return redirect()->back()->with('delete_success', 'faq deleted successfully!');
    }
}
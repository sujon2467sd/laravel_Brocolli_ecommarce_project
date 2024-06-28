<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Chosse;
use Illuminate\Support\Facades\File;

class ChosseController extends Controller
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
        return view('admin.about.choose',[
            'chooses'=>Chosse::get(),
        ]);
    }

    public function choose_status($id){

        $getstatus=Chosse::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Chosse::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Choose  Status change successfully!');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'short_tittle' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to validate the image
        ]);

        // Handle the file upload
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/cate_images'), $imageName);
        }

        // Create a new MainCategory instance and save it to the database
       $about = new Chosse();
       $about->name= $request->name;
       $about->short_tittle=$request->short_tittle;
       $about->description=$request->description;
       $about->status= $request->status;
       $about->img= $imageName; // Assuming 'cate_img' is the column where you store the image file name
       $about->save();

        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('success', 'Choose  created successfully!');
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

        $Chosse=Chosse::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/cate_images/' . $Chosse->img; // For deleting the old image select

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/cate_images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name= $Chosse->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
        $Chosse->update([
            'name' => $request->name,
            'short_tittle' => $request->short_tittle,
            'description' => $request->description,
            'status' => $request->status,
            'img' => $img_name,
        ]);

        return redirect()->back()->with('success', 'Chosse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chosse=Chosse::findOrfail($id);

        $deleteOldImage = 'admin/cate_images/' .$chosse->img; // For deleting the old image select
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $chosse->delete();
            return redirect()->back()->with('delete_success', 'choose deleted successfully!');
    }
}

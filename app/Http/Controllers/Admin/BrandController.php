<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.brand',[
            'brand'=> Brand::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function brand_status($id){

        $getstatus=Brand::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Brand::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Brand  Status change successfully!');

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
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to validate the image
    ]);

    // Handle the file upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/cate_images'), $imageName);
    } else {
        $imageName = null;
    }

    // Create a new MainCategory instance and save it to the database
   $brand = new Brand();
   $brand->name =$request->name;

   $brand->description = $request->description;
   $brand->status= $request->status;
   $brand->img = $imageName; // Assuming 'cate_img' is the column where you store the image file name
   $brand->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'Brand  created successfully!');
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

        return view('admin.brand.brand_edit',[
            'brand'=>Brand::find($id),
            'brands'=>Brand::get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $Subctegory=Brand::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/cate_images/' . $Subctegory->img; // For deleting the old image select

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/cate_images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name =  $Subctegory->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
        $Subctegory->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'img' => $img_name,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand=Brand::findOrfail($id);

        $deleteOldImage = 'admin/cate_images/' .$brand->img; // For deleting the old image select
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $brand->delete();
            return redirect()->back()->with('delete_success', 'brand deleted successfully!');
}


}

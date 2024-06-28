<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }


    public function banner_status($id){

        $getstatus=Banner::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Banner::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'banner  Status change successfully!');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.banner.banner',[
            'banners'=>Banner::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
              // Validate the form data
    $request->validate([
        'tittle' => 'required|string|max:255',
        'tittle_two' => 'required|string',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required',
        'link' => 'required' // Assuming you want to validate the image
    ]);

    // Handle the file upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/images'), $imageName);
    }

    // Create a new MainCategory instance and save it to the database
    $banner = new Banner();

    $banner->tittle = $request->tittle;
    $banner->tittle_two= $request->tittle_two;
    $banner->status= $request->status;
    $banner->img = $imageName;

    $banner->link=$request->link; // Assuming 'cate_img' is the column where you store the image file name
    $banner->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'banner created successfully!');
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
        return view('admin.banner.banner_edit',[

            'banner'=> Banner::find($id),
            // 'maincategory'=> MainCategory::get()

       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $banner=Banner::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/images/' . $banner->img; // For deleting the old image

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name = $banner->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
        $banner->update([
            'tittle' => $request->tittle,
            'tittle_two' => $request->tittle_two,
            'link' => $request->link,
             'status'=>$request->status,
            'img' => $img_name,
        ]);

        return redirect()->route('banner.create')->with('success', 'Banner updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $banner=Banner::findOrFail($id);
        $deleteOldImage = 'images/' . $banner->img; // For deleting the old image

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage); // Delete the old image
        }

    $banner->delete();

    // Redirect back with a success message
    return redirect()->back()->with('delete_success', 'banner deleted successfully!');
}



}
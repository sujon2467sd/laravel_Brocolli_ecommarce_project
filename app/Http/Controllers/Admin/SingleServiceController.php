<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\SingleService;
use App\Http\Controllers\Controller;

class SingleServiceController extends Controller
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
        return view('admin.service.single_service',[
             'services'=>SingleService::get(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function SingleService_status($id){

        $getstatus=SingleService::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         SingleService::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'single service  Status change successfully!');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'required|string',
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
    $SingleService = new SingleService();
    $SingleService->name = $request->name;
    $SingleService->short_description = $request->short_description;
    $SingleService->description = $request->description;
    $SingleService->status= $request->status;
    $SingleService->img = $imageName; // Assuming 'cate_img' is the column where you store the image file name
    $SingleService->save();

        // Optionally, you may return a response or redirect somewhere
        return redirect()->back()->with('success', 'Single_service  created successfully!');
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
       $SingleService=SingleService::findorFail($id);
        return view('admin.service.single_service_edit',[
            'service'=> $SingleService,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $SingleService=SingleService::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/cate_images/' .$SingleService->img; // For deleting the old image select

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/cate_images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name = $SingleService->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
       $SingleService->update([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'status' => $request->status,
            'img' => $img_name,
        ]);

        return redirect()->route('single-service.create')->with('success', 'Single Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $SingleService=SingleService::findOrfail($id);

        $deleteOldImage = 'admin/cate_images/' .$SingleService->img; // For deleting the old image select
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

           $SingleService->delete();

            return redirect()->back()->with('delete_success', 'Single Service deleted successfully!');
    }
}

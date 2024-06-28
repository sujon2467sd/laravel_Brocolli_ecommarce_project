<?php

namespace App\Http\Controllers\Admin;


use App\Models\maincategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MaincategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.main_category',[
            'maincategory'=> MainCategory::get(),


        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    public function cate_id($id){
             $category=maincategory::findOrfail($id);
             return view('frontend.home.home',compact('category'));
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
        // 'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to validate the image
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
    $mainCategory = new MainCategory();
    $mainCategory->name = $request->name;
    $mainCategory->description = $request->description;
    $mainCategory->img = $imageName; // Assuming 'cate_img' is the column where you store the image file name
    $mainCategory->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'Main category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Maincategory $maincategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {


        return view('admin.category.category_edit',[

             'edit_category'=> MainCategory::find($id),
             'maincategory'=> MainCategory::get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $maincategory=maincategory::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/cate_images/' . $maincategory->img; // For deleting the old image

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/cate_images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name = $maincategory->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
        $maincategory->update([
            'name' => $request->name,
            'description' => $request->description,
            'img' => $img_name,
        ]);

        return redirect()->route('main-category.index')->with('success', 'Main category updated successfully.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainCategory $mainCategory)
    {
        // Delete the MainCategory instance
        $deleteOldImage = 'admin/cate_images/' . $mainCategory->img; // For deleting the old image

            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

        $mainCategory->delete();

        // Redirect back with a success message
        return redirect()->back()->with('delete_success', 'category deleted successfully!');
    }


}

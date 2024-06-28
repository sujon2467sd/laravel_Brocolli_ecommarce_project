<?php

namespace App\Http\Controllers\Admin;

use App\Models\maincategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.sub_category',[
           'maincategory'=> maincategory::get(),
           'sub_category' => SubCategory::with('maincategories')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }


    // json data send for dynamic subcategory
    public function getSubcategories(Request $request)
{
    $categoryId = $request->input('categoryId');
    $subcategories = Subcategory::where('main_category', $categoryId)->get();
    return response()->json(['subcategories' => $subcategories]);
}
// json data send for dynamic subcategory end

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                     // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'main_category'=>'required',
        'description' => 'required|string',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to validate the image
    ]);

    // Handle the file upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/images'), $imageName);
    } else {
        $imageName = null;
    }

    // Create a new MainCategory instance and save it to the database
    $subCategory = new SubCategory();
    $subCategory->name = $request->name;
    $subCategory-> main_category= $request->main_category;
    $subCategory->description = $request->description;
    $subCategory->img = $imageName; // Assuming 'cate_img' is the column where you store the image file name
    $subCategory->save();


    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'Sub category created successfully!');
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
          $SubCategory=SubCategory::findOrfail($id);
          return view('admin.category.subcategory_edit',[
            'SubCategory'=> $SubCategory,
            'maincategory'=> maincategory::get(),
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Subctegory=SubCategory::findOrFail($id);
        // return $request;
        $img_name = ''; // Store the image path

        $deleteOldImage = 'admin/images' . $Subctegory->img; // For deleting the old image select

        if ($request->hasFile('img')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $file_img = $request->file('img'); // Get the uploaded image file
            $img_name = uniqid() . "." . $file_img->getClientOriginalExtension(); // Generate a unique file name
            $file_img->move(public_path('admin/images'), $img_name); // Move the uploaded file to the destination folder

        } else {
            $img_name =$Subctegory->img; // Use the existing image name if no new image is uploaded
        }

        // Update the main category data
        $Subctegory->update([
            'name' => $request->name,
            'main_category'=>$request->main_category,
            'description' => $request->description,
            'img' => $img_name,
        ]);

        return redirect()->route('sub-category.index')->with('success', 'Sub category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $SubCategory=SubCategory::findOrFail($id);
         // Delete the MainCategory instance
         $deleteOldImage = 'admin/cate_images/' . $SubCategory->img; // For deleting the old image select

         if (file_exists($deleteOldImage)) {
             File::delete($deleteOldImage); // Delete the old image
         }

         $SubCategory->delete();

     // Redirect back with a success message
     return redirect()->back()->with('delete_success', 'category deleted successfully!');
    }

}

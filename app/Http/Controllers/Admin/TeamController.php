<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
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
        return view('admin.about.team',[
              'teams'=>Team::get(),

        ]);
    }


    public function brand_status($id){

        $getstatus=Team::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

        Team::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Brand  Status change successfully!');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'disignation' => 'required|string|max:255',
        'facebook' => 'required|string|max:255',
        'twitter' => 'required|string|max:255',
        'linkdn' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle the file upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admin/cate_images'), $imageName);
    } else {
        $imageName = null;
    }

    // Create a new Team instance and save it to the database
    $team = new Team();
    $team->name = $request->name;
    $team->disignation = $request->disignation;
    $team->facebook = $request->facebook;
    $team->twitter = $request->twitter;
    $team->linkdn = $request->linkdn;
    $team->description = $request->description;
    $team->status = $request->status;
    $team->img = $imageName;

   // Debugging output

    // Optionally save the team object to the database
    $team->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'Team created successfully!');
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

        $Subctegory=Team::findOrFail($id);
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
            'disignation' => $request->disignation,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkdn' => $request->linkdn,
            'description' => $request->description,
            'status' => $request->status,
            'img' => $img_name,
        ]);

        return redirect()->back()->with('success', 'Teams updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team=Team::findOrfail($id);

        $deleteOldImage = 'admin/cate_images/' .$team->img; // For deleting the old image select
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage); // Delete the old image
            }

            $team->delete();
            return redirect()->back()->with('delete_success', 'team deleted successfully!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return view('admin.color.color',[
            'color'=>Color::get(),
          ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function color_status($id){


        $getstatus=Color::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Color::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'Color  Status change successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'color'=>'required',
            'status' => 'required',
            'description' => 'required|string',
        ]);

     $color = new Color();
        $color->name = $request->name;
        $color->color= $request->color;
        $color->description = $request->description;
        $color->status = $request->status;
        $color->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'color  created successfully!');
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

        return view('admin.color.color_edit',[

            'colors'=> Color::findOrFail($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Color=Color::findOrFail($id);

        // Update the main category data
        $Color->update([
            'name' => $request->name,
            'color' => $request->color,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('color.index')->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color=Color::findOrfail($id);


            $color->delete();
            return redirect()->back()->with('delete_success', 'Color deleted successfully!');
    }
}

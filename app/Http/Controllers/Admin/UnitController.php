<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.unit.unit',[
            'unit'=>Unit::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    public function unit_status($id){

        $getstatus=Unit::select('status')->where('id',$id)->first();//take value from status
        if($getstatus->status==1){
            $status=0;//any type variable
         }else{
            $status=1;//any type variable
         }

         Unit::where('id',$id)->update(['status'=>$status]);//updated value status

         return redirect()->back()->with('success', 'unit Status change successfully!');

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


    // Create a new MainCategory instance and save it to the database
    $unit = new Unit();
    $unit->name= $request->name;
    $unit->description = $request->description;
    $unit->status= $request->status;
    $unit->save();

    // Optionally, you may return a response or redirect somewhere
    return redirect()->back()->with('success', 'unit  created successfully!');
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
        return view('admin.unit.unit_edit',[
            'unit'=> Unit::findOrFail($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $unit=Unit::findOrFail($id);

        // Update the main category data
        $unit->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('unit.index')->with('success', 'unit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
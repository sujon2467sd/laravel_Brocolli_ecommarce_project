<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\AccountDetail;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AccountController extends Controller
{
   public function my_account(){
                return view('frontend.Account.dashboard',[

                        'prf_infos'=>AccountDetail::where('user_id', Auth::user()->id)->first(),
                        'orders'=>OrderTable::where('user_id', Auth::user()->id)->get(),



                ]);
   }


   public function order_view($id){

        return view('frontend.Account.order_view',[
            'orders'=>OrderTable::findOrfail($id),
            'iteams'=>OrderItem::with('product')->where('order_id',$id)->get(),//আমাদের পাস করার আইডি যদি অর্ডার আইডির সাথে যদি মিলে ।আইটেম মডেলে বিলংস টু রিলেশনশিপ হয়েছে।
            'shipping'=>ShippingAddress::where('order_id',$id)->get(),//আমাদের পাস করার আইডি যদি অর্ডার আইডির সাথে যদি মিলে
        ]);
   }

   public function order_cancel($id){

        $order= OrderTable::findOrfail($id);
        $order->delete();

        foreach ($order->items as $item) {//this items is hasmany realtionship from  OrderTable model
            $item->delete();
 }

          $order->shipping_address->delete(); //this shipping_address is hasone realtionship from  OrderTable model

        // $shipping=ShippingAddress::findOrfail($id);
        // $shipping->delete();


        return redirect()->back()->with('delete_success', 'Order cencelled successfully.');

   }

   public function account_details(Request $request)
   {
       // Validate the form data
       $request->validate([
           'description' => 'required|string',
           'address' => 'required|string',
           'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //    'email' => 'required|email',
        //    'name' => 'required|string',
        //    'current_password' => 'nullable|string',
        //    'new_password' => 'nullable|string|min:8|confirmed',
       ]);


       $user = Auth::user();

       // Fetch the existing account details
       $account = AccountDetail::where('user_id', $user->id)->first();//fetch ডাটা for update specific user info

       // Handle the file upload
       if ($request->hasFile('img')) {
           $image = $request->file('img');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('admin/cate_images'), $imageName);
       } else {
           // Use the existing image name if no new image is uploaded
           $imageName = $account ? $account->img : null;
       }

    //    // Check if the current password is provided and matches the one in the database
    //    if ($request->filled('current_password')) {
    //        if (!Hash::check($request->current_password, $user->password)) {
    //            return back()->withErrors(['current_password' => 'Current password is incorrect']);
    //        }

    //        // Update the password if new password is provided
    //        if ($request->filled('new_password')) {
    //            $user->password = Hash::make($request->new_password);
    //        }
    //    }

    //    // Update user details
    //    $user->email = $request->email;
    //    $user->name = $request->name;
    //      $user->save();


       // Create or update the AccountDetail instance and save it to the database
       $account = AccountDetail::updateOrCreate( //ইউজার আইডি চেক করে যদি েইউজার আইডি থাকে তাহলে সুধু আপডেট করে । আর না থাকলে ক্রেইট করে।
           ['user_id' => $user->id],//ইউজার আইডি চেক করে যদি েইউজার আইডি থাকে তাহলে সুধু আপডেট করে । আর না থাকলে ক্রেইট করে।
           [
               'bio' => $request->description,
               'address' => $request->address,
               'img' => $imageName,
           ]
       );

       // Optionally, return a response or redirect somewhere
       return redirect()->back()->with('success', 'Account details updated successfully!');
   }
}
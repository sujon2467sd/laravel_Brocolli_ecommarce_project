<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OrderItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
       public function place_order(Request $request){


         $ordertable = new OrderTable();
         $ordertable->user_id=Auth::user()->id;
         $ordertable->invoice_number=mt_rand(000000,999999);
         $ordertable->total= $request->total;
         $ordertable->payment_type= $request->payment;
         $ordertable->sub_total= $request->sub_total;
         $ordertable->cupondiscount= $request->cupon;
         $ordertable-> delever_charge= $request-> delever_charge;
         $ordertable->save();



         $cartContents = Cart::content();//create a object for collect data from cart

    // Iteam content  start
         foreach( $cartContents as $cartcontent){//foreach lopp healp two or more then product &quantity
              $OrderItem=new OrderItem();
              $OrderItem->product_id= $cartcontent->id;
              $OrderItem->product_qty= $cartcontent->qty;
              $OrderItem->order_id=$ordertable->id;//order table id after submited it will be genarate
             $OrderItem->save();


              // Update the sales column in the Product table
            $product = Product::find($cartcontent->id); // Fetch the product by its ID
            if ($product) {
                $product->sales += $cartcontent->qty; // Increment the sales column by the ordered quantity
                $product->save(); // Save the updated product record
            }

         }



// Iteam content end
         $request->validate([
            'name' => 'required|string|max:255',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'delever_charge'=>'required',
            'city' => 'required', // Assuming you want to validate the image
            'note' => 'required', // Assuming you want to validate the image
            'payment' => 'required', // Assuming you want to validate the image
        ]);

       $address=new ShippingAddress ();
       $address->name=$request->name;
       $address->order_id=$ordertable->id;
       $address->email=$request->email;
       $address->phone=$request->phone;
       $address->address=$request->address;
       $address->city=$request->city;
       $address->note=$request->note;
       $address-> delever_charge= $request-> delever_charge;
       $address->save();

       Cart::destroy();

       return redirect()->route('order.sccuess')->with('success', 'Order done successfully.');




       }

//order table end

public function order_sccuess(){
    return view('frontend.order.order_success');
}


}
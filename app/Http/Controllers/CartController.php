<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function Addcart(Request $request, $id)
    {
        $product = Product::findOrFail($id);//catch the id

        // Check if the product is already in the cart
        $cartItem = Cart::content()->where('id', $product->id)->first();
        if ($cartItem) {
            // Redirect back with a message if the product is already in the cart
            return back()->with('warning', 'This product is already added to your cart!');
        }

  //check stock grater than 0?


  //session collect data
        Cart::add([
            'id' => $product->id,//আইডি বেরিয়াবলে প্রডাক্টের আইডি রাখছি।
            'name' => $product->name,//নেম বেরিয়াবলে প্রডাক্টের নাম রেখেছি। লাস্টের নেম হবে ডাটা বেজ ্  ্এর নেম।
            'qty' => $request->qtybutton,
            'price' =>$product->price, 2,
            'options' => ['image' => $product->image_path]
        ]);
         // return Cart::content(); //for checking
        return back()->with('success', 'Add to Cart Successfully!');





    }

    public function showCart(){

        $cartContents = Cart::content();
        $subtotal = Cart::subtotal();

        $taxRate = 2;
        foreach (Cart::content() as $item) {
            Cart::setTax($item->rowId, $taxRate);
        }

        $tax=Cart::tax();

        return view('frontend.cart.cart_view', compact('cartContents', 'subtotal', 'tax',));
    }

    public function updateItem(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qtybutton);
        return back()->with('success', 'Cart updated successfully!');
    }


    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return back()->with('delete_success', 'Item removed from Cart Successfully!');
    }


public function CheckOut(){

    $cartContents = Cart::content();

    $subtotal = (float) str_replace(',', '', Cart::subtotal());

    $taxRate = 2;
    foreach (Cart::content() as $item) {
        Cart::setTax($item->rowId, $taxRate);
    }

    $tax = (float) str_replace(',', '', Cart::tax());

    $initialShippingCost = 0.0; // Set the initial shipping cost to 0
    $total = $subtotal + $tax + $initialShippingCost;

         return view('frontend.cart.check_out',[
             'cartContents'=> $cartContents,
             'subtotal'=> $subtotal,
             'tax'=>$tax,
             'total'=>$total,
         ]);
}


    // Cart::update($rowId, ['name' => 'Product 1']); // Will update the name

}
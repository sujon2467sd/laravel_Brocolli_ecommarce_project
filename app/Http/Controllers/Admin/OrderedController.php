<?php

namespace App\Http\Controllers\Admin;

use App\Models\logo;
use App\Models\OrderItem;
use App\Models\OrderTable;
use Illuminate\Http\Request;
use App\Models\TopMenuSetting;
use App\Models\ShippingAddress;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;

class OrderedController extends Controller
{
    public function pending_order(){

        return view('admin.order.pending',[
             'orders'=>OrderTable::where('status','pending')->get(),

        ]);
     }
     public function update_order_status(Request $request,$id){

        $order=OrderTable::findOrfail($id);
        $order->status=$request->input('status_single');

         $order->save();
        return redirect()->back()->with('success', 'Order status updated successfully.');

}

public function update_order_status_all(Request $request){

    $orderIds = $request->input('order_ids');
    $status = $request->input('status_bulk');

    if (!$orderIds || !$status) {
        return redirect()->back()->with('error', 'Please select orders and a status.');
    }
    // Update the status of the selected orders
    OrderTable::whereIn('id', $orderIds)->update(['status' => $status]);
    return redirect()->back()->with('success', 'Orders status updated successfully.');
}


     public function view_order($id){


           //tax



        return view('admin.order.view_order',[

                'iteams'=>OrderItem::with('product')->where('order_id',$id)->get(),//here belongs to relationship in orderIteam model
                'shipping'=> ShippingAddress::where('order_id',$id)->first(),
                'logo'=>logo::latest()->first(),
                'settings'=> TopMenuSetting::first(),
                'order'=>OrderTable::where('id',$id)->first(),
                // 'orders'=>OrderTable::where('id',$id)->get(),


        ]);
     }




     public function confirm_order(){
        return view('admin.order.confirm_order',[
            'orders'=>OrderTable::where('status','confirmed')->get(),

        ]);
     }
     public function delivered_order(){
        return view('admin.order.delivered_order',[
            'orders'=>OrderTable::where('status','delivered')->get(),

        ]);
     }
     public function cancelled_order(){
        return view('admin.order.cancelled_order',[
            'orders'=>OrderTable::where('status','cancelled')->get(),

        ]);
     }

     public function all_order(){

        return view('admin.order.all_order',[
             'orders'=>OrderTable::latest()->first()->get(),

        ]);
     }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function viewOrder($order_id){
        $orders = DB::table('orders')
                ->where('order_id','=',$order_id)
                 ->get();
        if(isset($orders[0])){
        foreach($orders as $order){
        $user = DB::table('eusers')
                    ->where('user_id','=',$order->user_id)
                    ->get();
        $product = DB::table('products')
                    ->where('product_id','=',$order->product_id)
                    ->get();

        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('order/view_order',['order'=>$orders,'user'=>$user,'product'=>$product]);
        }
        else{
            return redirect()->route('admin.login');
        }
        }
        }
        else{
            return redirect()->back();
        }
    }
    public function updateOrder($order_id){
        $orders = DB::table('orders')
                ->where('order_id','=',$order_id)
                 ->get();
        if(isset($orders[0])){
        foreach($orders as $order){
        $user = DB::table('eusers')
                    ->where('user_id','=',$order->user_id)
                    ->get();
        $product = DB::table('products')
                    ->where('product_id','=',$order->product_id)
                    ->get();
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('order/update_order',['order'=>$orders,'user'=>$user,'product'=>$product]);
        }
        else{
            return redirect()->route('admin.login');
        }
        }
        }
        else{
            return redirect()->back();
        }
    }
    public function updateOrderDB($order_id,Request $req){
        $req->validate([
            'order_status' => 'required|in:pending,dispatched,delivered,return'
        ],[
            'order_status.required' =>'Order status is required!',
            'order_status.in' =>'Order status must be either pending or dispatched or delivered or return'
        ]);
        $status_update = DB::table('orders')
                            ->where('order_id','=',$order_id)
                            ->update([
                                'order_status' => $req->order_status
                            ]);
        if($status_update){
            return redirect()->route('orders')->with('order_status_update','Order status updated successfully');
        }
        else{
            return redirect()->route('orders');
        }
    }
}

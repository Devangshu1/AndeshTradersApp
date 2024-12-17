<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function productOrder($product_id){
        $product = DB::table('products')
                    ->where('product_id','=',$product_id)
                    ->get();
        $totalsold = DB::table('orders')
                    ->where('product_id','=',$product_id)
                    ->sum('quantity');
        $orders = DB::table('orders')
                    ->leftjoin('eusers','orders.user_id','=','eusers.user_id')
                    ->where('orders.product_id','=',$product_id)
                    ->orderBy('orders.order_id','DESC')
                    ->get();
        if(isset($orders[0])){
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('sale/productorder',['product'=>$product,'totalsold'=>$totalsold,'orders'=>$orders]);
        }
        else{
            return redirect()->route('admin.login');
        }
        }
        else{
            return redirect()->back();
        }
    }
}

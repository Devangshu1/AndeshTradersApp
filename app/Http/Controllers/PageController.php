<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function indexPage(){
        $productcount = DB::table('products')
                        ->count('product_id');
        $ordercount = DB::table('orders')
                        ->count('order_id');
        $usercount = DB::table('eusers')
                        ->count('user_id');
        $order = DB::table('orders')
                    ->distinct()
                    ->count('user_id');
        $user = DB::table('eusers')
                    ->count('user_id');
        if($user>0){
        $sales_percentage = round(($order/$user)*100,2);
        }
        if(session()->has('login_success') && session()->get('login_success'))
        {
            if($user>0){
            return view('index',['productcount'=>$productcount,'usercount'=>$usercount,'ordercount'=>$ordercount,'sales_percentage'=>$sales_percentage]);
            }else{
                return view('index',['productcount'=>$productcount,'usercount'=>$usercount,'ordercount'=>$ordercount]);
            }
        }
        else{
            return redirect()->route('admin.login');
        }
    }
    public function ordersPage(){
        $orders = DB::table('orders')
                ->orderBy('order_id','DESC')
                 ->get();
        if(!isset($orders[0])){
            return view('order/orders',['orders'=>$orders]);
        }
        else{
        foreach($orders as $order){
        $user = DB::table('eusers')
                    ->where('user_id','=',$order->user_id)
                    ->get();
        $product = DB::table('products')
                    ->where('product_id','=',$order->product_id)
                    ->get();

            if(session()->has('login_success') && session()->get('login_success'))
            {
                return view('order/orders',['orders'=>$orders,'user'=>$user,'product'=>$product]);
            }
            else{
                return redirect()->route('admin.login');
            }
        }
        }
    }
    public function productsPage(){
        $products = DB::table('products')
        ->orderBy('product_id')
        ->paginate(5);
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('product/products',['products'=>$products]);
        }
        else{
            return redirect()->route('admin.login');
            }
    }
    public function salesPage(){
        $products = DB::table('products')
                        ->get();
        if(!isset($products[0])){
            return view('sale/sales',['products'=>$products]);
        }
        else{
        foreach($products as $product){
        $totalsold = DB::table('orders')
                    ->where('product_id','=',$product->product_id)
                    ->sum('quantity');

        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('sale/sales',['totalsold'=>$totalsold,'product'=>$product,'products'=>$products]);
        }
        else{
            return redirect()->route('admin.login');
        }
        }
        }
    }
    public function usersPage(){
        $users = DB::table('eusers as u')
            ->leftjoin('accountdetails as a','u.account_detail','=','a.account_id')
            ->select('u.user_id as user_id','u.e_email as email',
                    'u.username as username','u.phoneno as phone',
                    'u.address as address','a.account_no as account','a.ifsc_code as ifsc','a.bank_name as bank',
                    'a.branch_name as branch')
            ->get();
        // return $users;
        if(session('login_success'))
        {
            return view('user/users',['users'=>$users]);
        }
        else{
            return redirect()->route('admin.login');
        }
    }
}

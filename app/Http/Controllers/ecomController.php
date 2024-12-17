<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ecom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ecomController extends Controller
{
    public function ecom(){
        $products = DB::table('products')
        ->orderBy('product_id')
        ->paginate(5);
        return view('ecom.ecom',['products'=>$products]);
    }
    public function ecomView($id){
        $product = DB::table('products')
                    ->where('product_id','=',$id)
                    ->get();
        if(isset($product[0])){
            return view('ecom.ecomview',['product'=>$product]);
        }
        else{
            return redirect()->back();
        }
    }
    public function ecomSignupDB(Request $req){
        $req->validate([
            'signup_email' => 'required|email|unique:eusers,e_email',
            'signup_username' => 'required|alpha_num|min:8|unique:eusers,username',
            'signup_pass' => 'required|string|min:8',
            'signup_cpass' => 'required|string|min:8|same:signup_pass'
        ],[
           'signup_email.required' => 'Email is required!',
           'signup_email.email' => 'Please enter valid email!',
           'signup_email.unique' => 'Account exists with this email.Try to login or create account with different email!',
           'signup_username.required' => 'Username is required!',
           'signup_username.alpha_num' => 'Username must be alphanumeric!',
           'signup_username.min' => 'Username must be of minimum 8 characters!',
           'signup_username.unique' => 'This username is occupied. Please use unique username!',
           'signup_pass.required' => 'Passward is required!',
           'signup_pass.string' => 'Passward must be string!',
           'signup_pass.min' => 'Passward must be of minimum 8 characters!',
           'signup_cpass.required' => 'Confirm passward is required!',
           'signup_cpass.string' => 'Confirm passward must be string!',
           'signup_cpass.min' => 'Confirm passward must be of minimum 8 characters!',
           'signup_cpass.same' => 'Confirm passward does not match passward.Please enter same confirm passward and passward!'
        ]);

        $signup = DB::table('eusers')
            ->insert([
                'e_email'=> $req->signup_email,
                'username'=> $req->signup_username,
                'e_passward'=> Hash::make($req->signup_pass)
            ]);
        $user = DB::table('eusers')
            ->where('e_email','=',$req->signup_email)
            ->get();
        if($signup){
            session()->put('userdetail_add'.$user[0]->user_id,false);
            return redirect()->route('ecom.login')->with('signup_success','You signed up successfully! Now you can login...');
        }
    }
    public function ecomSignup(){
        if(session('user_login')){
            return redirect()->back();
        }
        else{
            return view('ecom.ecomsignup');
        }
    }
    public function ecomLogin(){
        if(session('user_login')){
            return redirect()->back();
        }
        else{
            return view('ecom.ecomlogin');
        }
    }
    public function ecomLoginDB(Request $req){
        $req->validate([
            'login_username' => 'required|alpha_num|min:8',
            'login_pass' => 'required|string|min:8'
        ],[
            'login_username.required' => 'Username is required!',
            'login_username.alpha_num' => 'Username must be alphanumeric!',
            'login_username.min' => 'Username must be of minimum 8 characters!',
            'login_pass.required' => 'Passward is required!',
            'login_pass.string' => 'Passward must be string!',
            'login_pass.min' => 'Passward must be of minimum 8 characters!'
        ]);
        $login = DB::table('eusers')
            ->where('username','=',$req->login_username)
            ->get();
        if(isset($login[0]->username)){
            if(Hash::check($req->login_pass, $login[0]->e_passward)){
                session()->put('user_login',true);
                session()->put('ecom_username',$req->login_username);
                return redirect()->route('ecom')->with('login','Logged in successfully...');
            }
            else{
                return redirect()->route('ecom.login')->with('login','Wrong password! Please enter correct password...');
            }
        }
        else{
            return redirect()->route('ecom.login')->with('login','User does not exists! Please correct username or sign up...');
        }
    }
    public function ecomBuy($id){
        $product = DB::table('products')
                    ->where('product_id','=',$id)
                    ->get();
        if(session('user_login')){
        $user = DB::table('eusers')
                    ->where('username','=',session('ecom_username'))
                    ->get();
        if(isset($product[0])){
        return view('ecom.buynow',['product'=>$product,'user'=>$user]);
        }
        else{
            return redirect()->back();
        }
        }
        else{
            return redirect()->route('ecom.login');
        }
    }
    public function ecomBuyDB($id,Request $req){
        $req->validate([
            'quantity'=>'required|numeric|min:1|max:1000',
            'payment_mode'=>'required|in:Prepaid,Postpaid'
        ],[
            'quantity.required' => 'Quantity is required!',
            'quantity.numeric' => 'Quantity must be numeric!',
            'quantity.min' => 'Quantity can not be less than 1!',
            'quantity.max' => 'Quantity can not be more than 1000!',
            'payment_mode.required' => 'Payment mode is required!',
            'payment_mode.in' => 'Payment can only be either Prepaid or Postpaid!'
        ]);
        $user_id = DB::table('eusers')
                        ->where('username','=',session('ecom_username'))
                        ->get();
        $order = DB::table('orders')
                    ->insert([
                        'quantity' => $req->quantity,
                        'order_type' => $req->payment_mode,
                        'product_id' => $id,
                        'user_id' => $user_id[0]->user_id,
                        // 'created_at' => time(),
                        // 'updated_at' => time(),
                        'order_date' => now()
                    ]);
        if($order){
            return redirect()->route('ecom')->with('order','Your Order placed successfully!');
        }
        // $date = DB::table('orders')
        //             ->where('order_id','=',$order)
        //             ->get();
        // $final = DB::table('orders')
        //             ->where('order_id','=',$order)
        //             ->update([
        //                 'order_date' => date($date[0]->created_at)
        //             ]);
    }
    public function ecomLogout(Request $req){
        session()->put('user_login',false);
        session()->put('ecom_username',false);
        return redirect()->route('ecom');
    }
    public function ecomUser($username){
        $user = DB::table('eusers')
            ->where('username','=',$username)
            ->get();
        if(isset($user[0])){
        $account = DB::table('accountdetails')
            ->where('account_id',"=",$user[0]->account_detail)
            ->get();
        if(session('user_login') && session('ecom_username')==$username){
            return view('ecom.ecomuser',['user'=>$user,'account'=>$account]);
        }
        else{
            return redirect()->back();
        }
        }
        else{
            return redirect()->back();
        }
    }
    public function ecomUserDB($id,Request $req){
        $req->validate([
            'add_phone' => 'required|numeric|digits:10',
            'add_address' => 'required|string',
            'add_account_no' => 'required|numeric|min:10',
            'add_ifsc' => 'required|alpha_num|max:20',
            'add_bank_name' => 'required|alpha',
            'add_branch' => 'required|alpha'
        ],[
            'add_phone.required' => 'Phone Number is required!',
            'add_phone.numeric' => 'Phone Number must be numeric!',
            'add_phone.digits' => 'Phone Number must be of 10 digits!',
            'add_address.required' => 'Address is required!',
            'add_address.string' => 'Address must be string!',
            'add_account_no.required' => 'Account Number is required!',
            'add_account_no.numeric' => 'Account Number must be numeric!',
            'add_account_no.min' => 'Account Number must be of minimum 10 digits!',
            'add_ifsc.required' => 'IFSC Code is required!',
            'add_ifsc.alpha_num' => 'IFSC Code must be alpha numeric!',
            'add_ifsc.max' => 'IFSC Code can be of maximum 20 characters!',
            'add_bank_name.required' => 'Bank Name is required!',
            'add_bank_name.alpha' => 'Bank Name must be alphabetic!',
            'add_branch.required' => 'Branch Name is required!',
            'add_branch.alpha' => 'Branch Name must be alphabetic!'
        ]);
        $add_ifsc = Str::upper($req->add_ifsc);
        $add_bank_name = Str::upper($req->add_bank_name);
        $add_branch = Str::upper($req->add_branch);
        $account = DB::table('accountdetails')
                        ->insert([
                            'account_no' => $req->add_account_no,
                            'ifsc_code' => $add_ifsc,
                            'bank_name' => $add_bank_name,
                            'branch_name' => $add_branch
                        ]);
        $user = DB::table('eusers')
                        ->where('username','=',session('ecom_username'))
                        ->get();
        if($account){
            $accountexists = DB::table('accountdetails')
                            ->where([
                            'account_no' => $req->add_account_no,
                            'ifsc_code' => $add_ifsc,
                            'bank_name' => $add_bank_name,
                            'branch_name' => $add_branch
                            ])
                            ->get();
            if($accountexists[0]->account_id){
                $euser = DB::table('eusers')
                        ->where('user_id','=',$user[0]->user_id)
                        ->update([
                            'phoneno'=>$req->add_phone,
                            'address'=>$req->add_address,
                            'account_detail'=>$accountexists[0]->account_id
                        ]);
                if($euser){
                    session()->put('userdetail_add'.$id,true);
                    return redirect()->route('ecom')->with('user_detail','User details added successfully');
                }
            }
        }
    }
}

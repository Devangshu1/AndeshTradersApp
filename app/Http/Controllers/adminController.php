<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function adminLogin(){
        if(session('login_success'))
        {
            return redirect()->route('index');
        }
        else{
        return view('admin');
        }
    }
    public function adminLoginDB(Request $req){
        $req->validate([
            'admin_username' => 'required|string|lowercase|min:8',
            'admin_pass' => 'required|string|min:8'
        ],[
            'admin_username.required' => 'Admin Username is required!',
            'admin_username.string' => 'Admin Username must be String!',
            'admin_username.lowercase' => 'Admin Username must be in lowercase!',
            'admin_username.min' => 'Admin Username must be of minimum 8 characters!',
            'admin_pass.required' => 'Admin Passward is required!',
            'admin_pass.min' => 'Admin Passward must be of minimum 8 characters!',
            'admin_pass.string' => 'Admin Username must be String!'
        ]);
        $dbpassward = DB::table('admins')
            ->select('passward')
            ->where('username','=',$req->admin_username)
            ->get();
            if(isset($dbpassward[0]->passward)){
            // foreach($dbpassward as $pass){
                if(Hash::check($req->admin_pass,$dbpassward[0]->passward)){
                    session()->put('login_success',true);
                    session()->put('username',$req->admin_username);
                    return redirect()->route('index')->with('login_status','Login Successful...');
                }
                else{
                    session()->put('login_success',false);
                    return redirect()->route('admin.login')->with('login_status','Wrong Admin Passward!');
                    //wrong passward
                }
            // }
            }
            else{
                session()->put('login_success',false);
                return redirect()->route('admin.login')->with('login_status','Wrong Admin Username!');
            }
    }
    public function logout(Request $req){
        session()->put('login_success',false);
        session()->put('username',false);
        return redirect()->route('admin.login');
    }
}

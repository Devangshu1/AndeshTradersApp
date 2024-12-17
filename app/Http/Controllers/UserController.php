<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewUser($id){
        $user = DB::table('eusers as u')
            ->leftjoin('accountdetails as a','u.account_detail','=','a.account_id')
            ->select('u.user_id as user_id','u.e_email as email',
                    'u.username as username','u.phoneno as phone',
                    'u.address as address','a.account_no as account','a.ifsc_code as ifsc','a.bank_name as bank',
                    'a.branch_name as branch')
            ->where('user_id','=',$id)
            ->get();
        if(isset($user[0])){
        if(session()->has('login_success') && session()->get('login_success'))
        {
            return view('user/view_user',['user'=>$user]);
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

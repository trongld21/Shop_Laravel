<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.user.login',['title'=>'GotechJSC - Đăng Nhập Hệ Thống']);
    }

    public function store(Request $request){
        $this->validate($request,[
                'username' => 'required|email:filter',
                'password' => 'required'
            ]
        );

        if(Auth::attempt([
            'email' => $request->input('username'), 
            'password' => $request->input('password')])){
            return redirect() -> route('admin');
        }

        Session::flash('error', 'Email hoặc password không đúng');

        return redirect() -> back();
    }
}
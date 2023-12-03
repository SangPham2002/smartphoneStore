<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // truy cập trang login
    public function login_page()
    {
        return view('layouts.loginPage');
    }

    //Chức năng đăng nhập
    public function login(Request $req)
    {
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect()->route('homePage.index');
        }
        return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu!');
    }
    //Chức năng đăng ký
    public function register(Request $req)
    {
        //validate

        //Ma Hoa
        $req->merge(['password'=>Hash::make($req->password)]);

        //register
        try {
            User::create($req->all());
        } catch (\Throwable $th) {
            dd($th);
        }
        return redirect()->route('homePage.loginPage')->with('success', 'Đăng ký tài khoản thành công!');
    }

    //Chức năng đăng xuất
    public function logout(Request $req)
    {
        Auth::logout();
        return redirect()->route('homePage.index');
    }

    //account dashboard
    public function account(){
        return view('layouts.inforUser');
    }
}

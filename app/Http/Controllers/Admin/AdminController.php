<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function postLogin(Request $req)
    {
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'role' => 1])) {
            return redirect()->route('admin.index');
        };
        return redirect()->back()->with('err', 'Sai tài khoản hoặc mật khẩu!');
    }
    public function signOut(Request $req){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

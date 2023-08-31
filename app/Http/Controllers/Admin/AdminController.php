<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request,
        [
            'email'=> 'required|email',
            'password'=> 'required',
        ],
        [
            'email.email' => 'Email chưa nhập đúng định dạng',
            'email.required' => 'Email không được để trống',
            'password.required' => 'Password không được để trống',
        ]);
        if(Auth::attempt($request->only('email','password'),$request->has('remember_token'))){
            return redirect()->route('admin');
        }else{
            return redirect()->back();
        }
        dd($request->only('email','password'));
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
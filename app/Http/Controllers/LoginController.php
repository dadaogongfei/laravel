<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        if($request->isMethod('post')){
            $user=['email'=>$request->post('email'),'password'=>$request->post('password')];
            $is_remember=boolval($request->post('is_remember'));
            $ret= \Auth::attempt($user,$is_remember);
            if(!$ret){
               return  redirect()->back()->withInput()->withErrors('账户或密码错误！');
            }
        }else
        return view('login.index');
    }
}

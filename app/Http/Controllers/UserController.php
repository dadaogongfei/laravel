<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Validator;
class UserController extends Controller
{
    //
    public function index(){
        $list=User::paginate(10);
        return view('user.index',['list'=>$list]);
    }
    public function addUser(Request $request){
        if($request->isMethod('post')){
            $rules=[
                'username'=>'required|min:5|unique:users',
                'email'=>'required|email|unique:users',
                'password'=>'required|min:6|'
             ];
            $messages=[
                'required'=>':attribute必须填写！',
                'min'=>':attribute长度不对',
                'unique'=>':attribute已经存在',
            ];
            $attributes=[
                'username'=>'用户名',
                'email'=>'邮箱',
                'password'=>'密码'
            ];
            $validator=Validator::make($request->all(),$rules,$messages,$attributes);
            if ($validator->fails()) {
                return redirect()->back()
                ->withErrors($validator)
                ->withInput($request);
            }
            $user = new User();
            $data['username']=$request->post('name');
            $data['password']=bcrypt($request->post('password'));
            $data['email']=$request->post('email');
            if($user->create($data)){
                return redirect()->back()->with('success','添加成功！');
            }
            
        }else{
            return view('user.add');
        }
    }
    public function delete(){
        
    }
    public function editUser(){
        
    }
}

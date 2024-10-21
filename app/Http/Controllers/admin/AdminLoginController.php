<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
   public function register(){
    return view('admin.register');
   }

   public function registerauth(Request $req){
    $validator=Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|same:password_confirmation',
            'password_confirmation' => 'required',
    ]);
if ($validator->passes()) {
        User::create([
                'name'=>$req->name,
                'email'=>$req->email,
                'password' => $req->password,
        ]);
        return redirect()->route('admin.login')->with('success','you are successfully Register');
        

}else{
        return redirect()->route('admin.register')->withErrors($validator)->withInput();
}
   }
   public function login(){
        return view('admin.login');
   }

   public function loginAuth(Request $req){
 $validator=Validator::make($req->all(),[
 'email'=>'required',
  'password'=>'required',
 ]);
if($validator->passes()){
                        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
                                return redirect()->route('admin.dashboard')->with('success', 'You are login successfully');
                        }else{
                                return redirect()->route('admin.login')->with('error','Either Email/Password is Icorrect');
                        }
}else{
        return redirect()->route('admin.login')->withErrors($validator)->withInput()->onlyInput('email');
 }
   }


   
}

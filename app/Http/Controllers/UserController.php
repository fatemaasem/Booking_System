<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    public function registerForm(){
        return view('auth.register');
    }
    public function registerAction(Request $request){

        //validation
        $data=$request->validate([
            'name'=>"required|string|max:100",
            'email'=>"required|email|unique:users,email",
            'password'=>"required|min:5|confirmed"
        ]);
        //hash password
        $data['password']=bcrypt($data['password']);
        //create
        $user=User::create($data);
        //make login
        Auth::login($user);
        //add success message into session
        Session::flash('success','Register successfully');
        $categories=Category::all();
        return view('app',compact('categories'));

    }
    public function loginForm(){
        return view('auth.login');
    }
    public function loginAction(Request $request){
        //validation
        $data=$request->validate([
            'email'=>"required|email",
            'password'=>"required|min:5"
        ]);
        //check if is found in database or not
        if(Auth::attempt($data)){//this function will add user in the session
        //massage success
        Session::flash('success','Login successfully');
        $categories=Category::all();
        return view('app',compact('categories'));
    }
        else{
            return view('auth/login')->withErrors([
                "isFound"=>"This User is not Found"
            ]);
        }



    }
    public function logout(){
        Auth::logout();
        $categories=Category::all();
        return redirect('./')->with('categories',$categories);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $title='login';
        $description="login";
        return view('auth.login',compact('title','description'));
    }
    public function login(Request $request){
$request->validate(['email'=>['required','email','min:3','max:200'],'password'=>['required','string','min:8','max:200']]);
$user=User::where('email',$request->email)->first();
if($user&&Hash::check($request->password,$user->password)){
    Auth::login($user);
return redirect()->route('home');
}else{
    return redirect()->back()->with('message','the email and password not correct');
}
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

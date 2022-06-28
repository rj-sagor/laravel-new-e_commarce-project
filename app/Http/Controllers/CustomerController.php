<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    //

    public function home(){
        return view('customer.login');
    }
    public function store(Request $request){
      
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6',
            'password_confirmation'=>'required_with:password|same:password|min:6'
        ]);
        User::insert([
            
            'name'=>$request->name,
            "role"=>2,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('customer/home');

        };
       

    }

    public function customerHome(){
        return view('customer.home');
    }
}

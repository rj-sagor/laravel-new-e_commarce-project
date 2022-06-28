<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocailMediaController extends Controller
{
    //

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        if(!User::where('email',$user->getEmail())->exists()){
            
            User::insert([  
            'name'=>$user->getNickname(),
            "role"=>2,
            'email'=>$user->getEmail(),
            'password'=>Hash::make('abc@134'),
        ]);

        }
            
        if(Auth::attempt(['email' => $user->email, 'password' => 'abc@134'])){
            return redirect('customer/home');
        };
      
    }
}

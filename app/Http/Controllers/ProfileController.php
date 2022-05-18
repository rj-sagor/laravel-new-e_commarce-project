<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('admin.profile.index');
    }
    public function editName(Request $request){
        $request->validate([
                 'name'=>'required'
             ]);
        if( auth::User()->updated_at->addDays(30) < Carbon::now()){
            User::find(Auth::id())->update([
                    'name'=> $request->name
                 ]);
        
        return back()->with('success','profile name edit successfully!');

                }
        else{
            $left_days=Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30));
            return back()->with('success_status','you can change your name after'.$left_days.'days');
        };
       

    }

    public function chnagepassword(Request $request){
        $request->validate([
            'password'=>'confirmed|min:8'
        ]);

        if (Hash::check($request->old_password,Auth::user()->password)) {
            if($request->old_password == $request->password){
                return back()->withErrors('passwordErr','Puran password abar dicen');
            }
            else{
                User::find(Auth::id())->update([
                    'password'=>$request->password,
                ]);
            return back()->with('password','your password updated successfully!');

            }
        }
        else{
            return back()->with('passwordErr','your old password does not match');
           
        }

    }
}

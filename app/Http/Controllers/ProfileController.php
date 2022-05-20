<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\RateLimiter\RequestRateLimiterInterface;

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
    public function Chnageprofilephoto(Request $request){
        $request->validate([
            'profile_photo'=>'required|image',
        ]);
        if($request->hasFile('profile_photo')){
            if(Auth::user()->profile_photo != 'profil_photo.png'){
                $old_file_location='public/uploads/profile/'.Auth::user()->profile_photo;
                unlink(base_path($old_file_location));
            }
        $uploaded_photo=$request->file('profile_photo');  
         $new_profile_photo=Auth::id().'.'. $uploaded_photo->getClientOriginalExtension();
         $new_profile_photo_location='public/uploads/profile/'.$new_profile_photo;
        Image::make( $uploaded_photo)->save(base_path($new_profile_photo_location));

        User::find(Auth::id())->update([
            'profile_photo'=>$new_profile_photo
        ]);
        return back()->with('photo','photo updated successfully');

        }
        else{
            return back()->with('photo','you dont have any photo');

        }
            
    }

}

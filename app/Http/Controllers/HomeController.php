<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Mail\MailSendUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ceckrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::latest()->simplePaginate(2);
        $total_user=User::count();
        return view('/home',compact('users','total_user'));
    }
    // public function contack()
    // {
    //     return view('contack');
    // }
    public function SendMailuser(){

        // foreach(User::all()->pluck('email') as $email){
          
        //     Mail::to($email)->send( new MailSendUser());
          
        //   }
        //   return back();
         $email= User::find(14)->email;
       Mail::to($email)->send( new MailSendUser());
       return back();
            
        }
        
        public function UserInfoDownload($user_id){
            // echo UserInfo::findOrFail($user_id);
            return Storage::download( UserInfo::findOrFail($user_id)->user_file);

        }
     

}

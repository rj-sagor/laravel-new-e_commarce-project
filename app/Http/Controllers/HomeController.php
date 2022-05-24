<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\MailSendUser;
use Illuminate\Support\Facades\Mail;

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

        foreach(User::all()->pluck('email') as $email){
          
            Mail::to($email)->send( new MailSendUser());
          
          }
          return back();
        
            
        }
     

}

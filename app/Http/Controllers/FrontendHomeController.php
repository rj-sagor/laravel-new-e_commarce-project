<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\UserInfo;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    //
    public function index(){
        $products=Product::all();
        $categories=Category::all();
        return view('welcome',compact('categories','products'));
    }
    public function contuck(){
        return view('contack');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        
        UserInfo::insert($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('Success','Your information send successfull !');

    }
    public function view(){

      $all_info=UserInfo::all();
        return view('admin.userinfo.view',compact('all_info'));
    }

}

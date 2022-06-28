<?php

namespace App\Http\Controllers;

use queue;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserInfo;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Events\UserSendEvent;
use App\Models\Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;


class FrontendHomeController extends Controller
{
    //
    public function index(){
      
        $products=Product::all();
        $categories=Category::all();
       return view('welcome',compact('categories','products'));
    }

    public function SlugShow($slug){
        $product=Product::where('slug',$slug)->first();
       $product->category_id;
        $rileted_product=Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
   
        return view('frontend.product_detail',compact('product','rileted_product'));
    }

    public function contuck(){
        return view('contack');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
        ]);
        
         $user_id=UserInfo::insertGetId($request->except('_token')+[
            'created_at'=>Carbon::now(),
        ]);
        if($request->hasFile('user_file')){
           $name =$request->file('user_file') ->getClientOriginalName();

            $path = $request->file('user_file')->storeAs('contack_uploads',$name.'.'.$request->file('user_file')->getClientOriginalExtension());

           UserInfo::find($user_id)->update([
               'user_file'=>$path,
           ]);
        }


        //  return back()->with('Success','Your information send successfull !');

    }
    public function view(){

      $all_info=UserInfo::all();
        return view('admin.userinfo.view',compact('all_info'));
    }
    public function subscription(Request $request){
        $request->validate([
            'email'=>'required|unique:subscriptions,email'
        ]);
        event(new UserSendEvent($request->input('email')));
        
return back();
    }

    public function shop(){
        $categories=Category::all();
        $products=Product::all();
        return  view('frontend.shop',compact('categories','products'));
    }
   
  
}

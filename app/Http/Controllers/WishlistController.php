<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class WishlistController extends Controller
{
    //
    public function store(Request $request){
        if(Cookie::get('g_wish_id')){
            $genarate_wish_id=Cookie::get('g_wish_id');
        }
        else
        {
         $genarate_wish_id= Str::random(5).rand(1,1000);
        Cookie::queue('g_wish_id', $genarate_wish_id, 1440);

        }
        if(Wishlist::Where('genarate_wish_id',$genarate_wish_id)->Where('product_id',$request->product_id)->exists()){
            Wishlist::Where('genarate_wish_id',$genarate_wish_id)->Where('product_id',$request->product_id)->increment('product_quantity',$request->product_quantity);
        }else{
              Wishlist::insert([
              "genarate_wish_id"=>$genarate_wish_id,
              "product_id"=>$request->product_id,
              'product_quantity'=>$request->product_quantity,
              "created_at"=>Carbon::now(),

        ]);
        }
     
        
       

    }

    public function Wishlist(){
        return view('frontend.wishlist');
    }

   public function  remove($id){
    Wishlist::find($id)->delete();
    return back();

   } 
}

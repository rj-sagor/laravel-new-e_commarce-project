<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    //
    public function store(Request $request){
     
         if(Cookie::get('g_cart_id')){
            $genarate_cart_id=Cookie::get('g_cart_id');
         }
         else{

           $genarate_cart_id=Str::random(5).rand(1,1000);
            Cookie::queue('g_cart_id', $genarate_cart_id, 1440);
         }
         if(Cart::where('genarate_cart_id',$genarate_cart_id)->where('product_id',$request->product_id)->exists()){
            Cart::where('genarate_cart_id',$genarate_cart_id)->where('product_id',$request->product_id)->increment('product_quantity',$request->product_quantity);
         }
         else{
              Cart::insert([
            'genarate_cart_id'=> $genarate_cart_id,
            'product_id'=>$request->product_id,
            'product_quantity'=>$request->product_quantity,
            'created_at'=>Carbon::now()
        ]);
         }
         return back();
       

    }

    public function cartpageShow($coupon_name=""){
      Coupon::where('coupon_name',$coupon_name)->first();
      $error_message='';
      $discount=0;
      if($coupon_name== ''){
         $error_message;
      }
      else{
         if(!Coupon::where('coupon_name',$coupon_name)->exists()){
            $error_message="This coupon dose not match";
  
        }
        else{
  
           if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name',$coupon_name)->first()->validatity_till)
           {
              $error_message="this coupon hasbeen expired";
           }
             else
                {
              // echo 'your shopping more den:'. Coupon::where('coupon_name',$coupon_name)->first()->min_purchase;
              $sub_total=0;
              foreach( cart_item() as $cart_item){
                 $sub_total += $cart_item->product_quantity * $cart_item->Cart_RiletionTo_Product->price;
              }
              if(Coupon::where('coupon_name',$coupon_name)->first()->min_purchase > $sub_total )
              {
                 $error_message= "your shopping more den:". Coupon::where('coupon_name',$coupon_name)->first()->min_purchase;
              }
  
              else
              {
                 $discount=Coupon::where('coupon_name',$coupon_name)->first()->coupon_discount;
              }
              
           }
          
        
        }

      }
      
      $av_coupon= Coupon::whereDate('validatity_till', '>=',Carbon::now()->format('Y-m-d'))->get();
     
   
   
       return view('frontend.cart_show_page',compact('error_message','discount','coupon_name','av_coupon'));
  }
  public function Remove_product($id){
   Cart::find($id)->delete();
   return back();
  }
 

  public function update(Request $request){
   foreach($request->product_info as $cart_id =>$product_quantity ){

      Cart::find($cart_id)->update([
         'product_quantity'=>$product_quantity,
      ]);
   
   }
   return back();

  }
}

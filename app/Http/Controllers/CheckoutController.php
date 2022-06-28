<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Billings;
use App\Models\District;
use App\Models\Division;
use App\Models\Shipping;
use App\Mail\purchaseInfo;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('ceckrole');
    }
    public function home(){
          $division=Division::all();
          $district=District::all();
        return view('frontend.checkout',compact('division','district'));
    }

    public function ajaxListdistrict(Request $request){
       $district= District::where('division_id',$request->division_id)->get();
       $sendToDistrict= "";
       foreach($district as $district){
       
        $sendToDistrict .= "<option value='".$district->id."'>".$district->name ."</option>";
        

       };
       return $sendToDistrict;
    }
    public function billings(Request $request){
        // print_r($request->all());
        if(isset($request->different_address)){
            $shipping_id=Shipping::insertGetId([
                'name'=>$request->shipping_name,
                'email'=>$request->shipping_email,
                'number'=>$request->shipping_number,
                'country_id'=>$request->shipping_country_id,
                'city_id'=>$request->shipping_city_id,
                'address'=>$request->shipping_address,
                'created_at'=>Carbon::now(),
            ]);
        }
        else
        {
        
         $shipping_id=Shipping::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address'=>$request->address,
            'notes'=>$request->notes,
        ]);

        } 

       $billing_id = Billings::insertGetId([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'address'=>$request->address,
            'notes'=>$request->notes,
        ]);

         $order_id= Order::insertGetId([

        'user_id'=>Auth::id(),
        'sub_total'=>session('sub_total'),
        'coupon_name'=>session('coupon_name') ,
        'discount_amount'=>session('discount_amaunt'),
        'total'=>session('sub_total') -  session('discount_amaunt'),
        'payment'=>$request->payment,
        'billing_id'=>$billing_id,
        'shipping_id'=>$shipping_id,
         'created_at'=>Carbon::now(),
         ]);

         
            foreach(cart_item() as $item){
                OrderDetails::insert([
                 'order_id'=>$order_id,
                 'product_id'=>$item->product_id,
                 'product_quantity'=>$item->product_quantity,
                 'price'=>$item->Cart_RiletionTo_Product->price,
                 'created_at'=>Carbon::now(),
                ]);
                Product::find($item->product_id)->decrement('product_quantity',$item->product_quantity);
                $item->delete();
            }
           
            Mail::to($request->email)->send( new purchaseInfo());

         return redirect('cart/page/show');
        
        
        
    }
}

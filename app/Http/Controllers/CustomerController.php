<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;


use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class CustomerController extends Controller
{
    //

    public function home(){
        return view('customer.login');
    }
    public function store(Request $request){
      
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6',
            'password_confirmation'=>'required_with:password|same:password|min:6'
        ]);
        User::insert([
            
            'name'=>$request->name,
            "role"=>2,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('customer/home');

        };
       

    }

    public function customerHome(){
        $order_details=OrderDetails::with(['Order_details_Order','Order_details_product'])->where('user_id',Auth::id())->get();
        return view('customer.home',compact('order_details'));
    }
    public function orderinvoicedowload($id){
        $order_details=OrderDetails::with('Order_details_Order')->find($id);
        $pdf = PDF::loadView('pdf.invoice',compact('order_details'))->setPaper('a4', 'portrait');
        // $pdf = PDF::loadView('Home.report')->setPaper('a4', 'portrait');
        // return $pdf->download('inronman.pdf');
        return $pdf->stream('inronman.pdf');

    }
}

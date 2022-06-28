@extends('layouts.frontend_master')

@section('frontend_app')
<div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Checkout</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-form form-style">
                    <h3>Billing Details</h3>
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <p> Name *</p>
                                <input type="text" value="{{ Auth::user()->name }}" name="name">
                            </div>
                             <div class="col-sm-6 col-12">
                                <p>Email Address *</p>
                                <input type="email" value="{{ Auth::user()->email }}" name="email">
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>Phone No. *</p>
                                <input type="text" name="number">
                            </div>
                          
                        
                            <div class="col-sm-6 col-12">
                                <p>Division</p>
                                <select id="division_1" name="country_id">
                                    <option value="1">Select a country</option>
                                    @foreach ($division as $division )
                                          <option value="{{$division->id  }}">{{ $division->name }} </option>
                                    @endforeach
                                  
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 col-12">
                                <p>City</p>
                                <select id="district_1" name="city_id">
                                    <option value="">Select a country</option>
                                  
                                    
                                </select>
                            </div>
                            
                            <div class=" col-sm-6 col-12">
                                <p>Your Address *</p>
                                <input type="text" name="address">
                            </div>

                            <div class="col-12">
                               
                                <div class="create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <span>Account password</span>
                                    <input type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <input id="toggle2" type="checkbox" name="different_address" value="1">
                                <label class="fontsize" for="toggle2">Ship to a different address?</label>
                                <div class="row" id="open2">
                                    <div class="col-12">
                                        <p>Name *</p>
                                        <input type="email" value="" name="shipping_name">
                                    </div>
                                    <div class="col-12">
                                        <p>Email Address *</p>
                                        <input type="email" value="" name="shipping_email">
                                    </div>
                                    <div class=" col-12">
                                        <p>Phone No. *</p>
                                        <input type="text" name="shipping_number">
                                    </div>
                                  
                                    <div class="  col-12">
                                        <p>Your Address *</p>
                                        <input type="text" name="shipping_address">
                                    </div>
                                
                                    <div class=" col-12">
                                        <p>Divition</p>
                                        <select id="s_country" name="shipping_country_id">
                                            <option value="1">Select a country</option>
                                            <option value="2">bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <p>district</p>
                                        <select id="s_country" name="shipping_city_id">
                                            <option value="1">Select a country</option>
                                            <option value="2">bangladesh</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">Afghanistan</option>
                                            <option value="5">Ghana</option>
                                            <option value="6">Albania</option>
                                            <option value="7">Bahrain</option>
                                            <option value="8">Colombia</option>
                                            <option value="9">Dominican Republic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Order Notes </p>
                                <textarea name="notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                            </div>
                        </div>
                   
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-area">
                    <h3>Your Order</h3>
                    <ul class="total-cost">
                        
                        @foreach ( cart_item() as $item )
                            <li>{{ $item->Cart_RiletionTo_Product->product_name }} X {{ $item->product_quantity }} <span class="pull-right">${{ $item->Cart_RiletionTo_Product->price *  $item->product_quantity}}</span></li>
                            
                        @endforeach
                        
                        <li>Subtotal <span class="pull-right"><strong>${{ session('sub_total') }}</strong></span></li>
                        <li>Discount({{ session('coupon_name') }}) <span class="pull-right">{{ session('discount_amaunt') }}</span></li>
                        <li>Shipping <span class="pull-right">Free</span></li>
                        <li>Total<span class="pull-right">${{ session('sub_total') -  session('discount_amaunt') }}</span></li>
                    </ul>
                    <ul class="payment-method">
                      
                        <li>
                            <input id="card" type="radio" value="1" name="payment">
                            <label for="card">Credit Card</label>
                        </li>
                        <li>
                            <input id="delivery" type="radio" value="2" name="payment">
                            <label for="delivery">Cash on Delivery</label>
                        </li>
                    </ul>
                    <button>Place Order</button>
                </div>
            
            </div>
         </form>
        </div>
    </div>
</div>

@endsection
@section('fotter_script')
<script>
   
    $(document).ready(function() {
      $('#division_1').select2();
      $('#district_1').select2();
      $('#division_1').change(function(){
       var division_id=$(this).val();
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        type : "POST",
        url : "/district/list/ajax",
        data : {division_id:division_id},
        success : function(data){
          
            $('#district_1').html(data);
        }

       });
      
    });
      
});
</script>

@endsection
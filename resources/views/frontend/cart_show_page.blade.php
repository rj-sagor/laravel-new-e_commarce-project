@extends('layouts.frontend_master')

@section('frontend_app')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                @if ($error_message != '')
                <div class="alert alert-danger">
                    {{$error_message  }}
                </div>
                    
                @endif
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="product_quantity">A:Q</th>
                                <th class="quantity">Quantity</th>
                                <th class="total">Total</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sub_total=0;
                                $flag=0;
                            @endphp
                            @forelse (cart_item() as $cart_data )
                                  <tr class="{{($cart_data->Cart_RiletionTo_Product->product_quantity < $cart_data->product_quantity) ? 'bg-danger' : ''}}">  
                                <td class="images"><img src="{{ asset('uploads/product') }}/{{$cart_data->Cart_RiletionTo_Product->image  }}" alt=""></td>
                                <td class="product"><a href="single-product.html">{{ $cart_data->Cart_RiletionTo_Product->product_name }}</a>
                                </td>
                                  <td class="ptice">{{ $cart_data->Cart_RiletionTo_Product->price }}</td>
                                <td class="product_quantity">{{ $cart_data->Cart_RiletionTo_Product->product_quantity}}
                                @if ($cart_data->Cart_RiletionTo_Product->product_quantity < $cart_data->product_quantity)
                                    <br>
                                    <span> Available quantity is:{{ $cart_data->Cart_RiletionTo_Product->product_quantity }}</span>
                                    @php
                                        $flag=1;
                                    @endphp
                                @endif
                                </td>
                                <td class="quantity cart-plus-minus">
                                    <input type="text" value="{{ $cart_data->product_quantity}}" name="product_info[{{$cart_data->id  }}]" />
                                    
                                </td>
                                <td class="total">{{ $cart_data->product_quantity *  $cart_data->Cart_RiletionTo_Product->price }}</td>
                                
                                <td ><a href="{{ route('remove.product.cart',$cart_data->id) }} " class="remove"><i class="fa fa-times"></i></a></td>
                            </tr> 
                            @php
                                $sub_total=$sub_total + $cart_data->product_quantity *  $cart_data->Cart_RiletionTo_Product->price
                            @endphp
                            @empty


                            @endforelse
                           
                           
                        </tbody>
                    </table>
                    <div class="row mt-60">
                        <div class="col-xl-4 col-lg-5 col-md-6 ">
                            <div class="cartcupon-wrap">
                                <ul class="d-flex">
                                    <li>
                                        <button type="submit" >Update Cart</button>
                                    </li>   
                                 </form>

                                    <li><a href="{{ url('/') }}">Continue Shopping</a></li>
                                </ul>
                                <h3>Cupon</h3>
                                <p>Enter Your Cupon Code if You Have One</p>
                                <div class="cupon-wrap">
                                    <input type="text" placeholder="Cupon Code" id="apply_coupon_input" value="{{ $coupon_name }}">
                                    <button type="button" id="apply_coupon_id">Apply Cupon</button>
                                </div>
                                @foreach ($av_coupon as $av_coupon )
                                <button value="{{ $av_coupon->coupon_name }}" class="badge available_coupon" type="button">{{ $av_coupon->coupon_name }} - More then shoppin : {{ $av_coupon->min_purchase }}</button>
                                    
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                            <div class="cart-total text-right">
                                <h3>Cart Totals</h3>
                                <ul>
                                    <li><span class="pull-left">Subtotal </span>{{ $sub_total }}</li>
                                    @php
                                        session(['sub_total' => $sub_total]);
                                    @endphp
                                    <li><span class="pull-left">Discount(%) </span>{{ $discount }}</li>
                                    <li><span class="pull-left">Discount({{ ($coupon_name ) ? $coupon_name: "-"}}) </span>{{ ($sub_total * $discount)/100 }}</li>
                                    @php
                                        session(['coupon_name' => $coupon_name]);
                                    @endphp
                                    <li><span class="pull-left"> Total </span> ${{$sub_total -($sub_total * $discount)/100   }}</li>
                                    @php
                                    session(['discount_amaunt' => ($sub_total * $discount)/100]);
                                        
                                    @endphp
                                </ul>
                              @if ($flag==1)
                              <a >plase solve problem</a>

                              @else
                                  <a href="{{ route('checkout.page') }}">Proceed to Checkout</a>
                              @endif
                                
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->
    
@endsection
@section('fotter_script')
<script>
    
    $(document).ready(function(){
       $("#apply_coupon_id").click(function(){
        var apply_coupon_input=$('#apply_coupon_input').val();
        var link_to_go="{{ url('cart/page/show') }}/" +apply_coupon_input;
       window.location.href= link_to_go;
       }) 

       $(".available_coupon").click(function(){
        
         $('#apply_coupon_input').val($(this).val())
       }) 
    })
</script>
    
@endsection
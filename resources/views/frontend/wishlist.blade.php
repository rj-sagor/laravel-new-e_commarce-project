@extends('layouts.frontend_master')
@section('frontend_app')
  <!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap text-center">
                    <h2>Wishlist</h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><span>Wishlist</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .breadcumb-area end -->
<!-- cart-area start -->
<div class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="http://themepresss.com/tf/html/tohoney/cart">
                    <table class="table-responsive cart-wrap">
                        <thead>
                            <tr>
                                <th class="images">Image</th>
                                <th class="product">Product</th>
                                <th class="ptice">Price</th>
                                <th class="stock">Stock Stutus </th>
                                <th class="addcart">Add to Cart</th>
                                <th class="remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse (Wishlist_item() as $item )
                          @php
                              $value=0;
                              $add=0
                          @endphp
                               <tr>
                                <td class="images"><img src="{{ asset('uploads/product') }}/{{ $item->Wishlist_to_product->image }}" alt=""></td>
                                <td class="product"><a href="single-product.html">{{ $item->Wishlist_to_product->product_name }}</a></td>
                                <td class="ptice">${{ $item->Wishlist_to_product->price }}</td>
                                <td class="stock">
                                    
                                    @if ($item->Wishlist_to_product->product_quantity > $value)
                                    <span>stock available</span>
                                        
                                    @else
                                        <span>stock not available</span>
                                        @php
                                       $add=1;
                                    @endphp
                                    @endif
                                </td>
                                @if ($add==1)
                                <td class="addcart"><a href="">Stock out</a></td>
                                    
                                @else
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <td class="addcart">
                                        <input type="hidden" name="product_id" id="" value="{{ $item->product_id }}">
                                        <input type="hidden" name="product_quantity" value="1">
                                        <button type="submit" class="btn btn-danger" >Add to Cart</button>
                                    </td>
                                </form>
                                    
                                @endif
                                
                                <td class="remove"><a href="{{ route('wishlist.remove',$item->id) }}"><i class="fa fa-times"></i></a></td>
                            </tr>
                          @empty
                              
                          @endforelse
                           
                            
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-area end -->


@endsection
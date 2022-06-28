<?php
function total_valu_count(){
return App\Models\Product::count();
}

function Cart_count(){
    return App\Models\Cart::where('genarate_cart_id',Cookie::get('g_cart_id'))->count();  
}

function cart_item(){
    return App\Models\Cart::where('genarate_cart_id',Cookie::get('g_cart_id'))->get();  
}
function Wishlist_count(){
    return App\Models\Wishlist::where('genarate_wish_id',Cookie::get('g_wish_id'))->count();
}
function Wishlist_item(){
    return App\Models\Wishlist::where('genarate_wish_id',Cookie::get('g_wish_id'))->get();
}
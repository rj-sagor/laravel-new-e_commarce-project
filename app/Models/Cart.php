<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
  
    protected $fillable = [
        'product_quantity',
        
        
    ];

    // public function cartriletiontoProduct(){
    //     return $this->belongsTo(Product::class,'product_id','id');
        
    // }
    public function Cart_RiletionTo_Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

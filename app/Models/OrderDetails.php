<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class OrderDetails extends Model
{
    use HasFactory;
    public function Order_details_product(){
        return $this->belongsTo(Product::class ,'product_id','id');
    }
    public function Order_details_Order(){
        return $this->belongsTo(Order::class ,'order_id','id');
    }
}

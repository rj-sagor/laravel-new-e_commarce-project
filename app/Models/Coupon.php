<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded =[]; 

    public function Coupon_to_user(){
        return $this->belongsTo(User::class,'added_by','id');
    }
}

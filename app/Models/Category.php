<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function categorytouser(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    protected $fillable = [
        'category_name',
        
    ];
}

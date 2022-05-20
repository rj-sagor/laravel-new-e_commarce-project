<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;

    public function categorytouser(){
        return $this->belongsTo(User::class,"user_id","id");
    }

    protected $fillable = [
        'category_name',
        'category_photo',
        
    ];
}

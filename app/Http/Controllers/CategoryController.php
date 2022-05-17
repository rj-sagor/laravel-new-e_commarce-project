<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function addcategory(){
        $all_category=Category::latest()->simplePaginate(2);
        return view('admin.category.index',compact('all_category'));
    }
    public function uploadscategory(CategoryForm $request){
        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('category', $request->category_name.' category added succefully');
       

    }
}

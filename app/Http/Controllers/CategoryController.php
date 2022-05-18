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
        $all_category=Category::latest()->simplePaginate(4);
        $delete_category=Category::onlyTrashed()->simplePaginate(3);
        return view('admin.category.index',compact('all_category','delete_category'));
    }
    public function uploadscategory(CategoryForm $request){
        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('category', $request->category_name.' category added succefully');
       

    }
    public function deletecategory($id){
        Category::find($id)->delete();
        return back()->with('success',"category deleted successfully !");

    }
    public function editcategory($id){
        $all_data=Category::find($id);
        return view('admin.edit',compact('all_data'));
    }
    public function updatecategory(Request $request ,$id){
        Category::find($id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>Carbon::now(),
          

        ]);
        return back()->with('succes','category updated successfully !');

    }
    public function restorecategory($id){
        Category::withTrashed()->find($id)->restore();
        return back();

    }
    public function forcedeletecategory($id){
      Category::withTrashed()->find($id)->forceDelete();
      return back();
    }
    public function  markdelete(Request $request){
        

       foreach($request->category_id as $car_id){
        Category::find($car_id)->delete();
       }
       return back();

    }
}

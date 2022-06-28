<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryForm;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ceckrole');
    }

    public function addcategory(){
        $all_category=Category::latest()->simplePaginate(4);
        $delete_category=Category::onlyTrashed()->simplePaginate(3);
        return view('admin.category.index',compact('all_category','delete_category'));
    }
    public function Categoryuploads(CategoryForm $request){
        

        $category_id=Category::insertGetId([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);

       
        if($request->hasFile('category_photo')){
            
            $uploaded_photo=$request->file('category_photo');
            $new_profile_photo=$category_id.'.'. $uploaded_photo->getClientOriginalExtension();
            $new_profile_photo_location='public/uploads/category/'.$new_profile_photo;
           Image::make( $uploaded_photo)->resize(200,200)->save(base_path($new_profile_photo_location));
   
           Category::find($category_id)->update([
               'category_photo'=>$new_profile_photo
           ]);
        }

         return back()->with('category', $request->category_name.' category added succefully');
       

    }
    public function deletecategory($id){
        Category::find($id)->delete();
        Product::where('category_id', $id)->delete();
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
        
      if(isset($request->category_id)){
        foreach($request->category_id as $car_id){
            Category::find($car_id)->delete();
      }
       
       }
       return back();

    }
}

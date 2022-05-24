<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Faker\Core\File;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $all_product=Product::all();
        return view('admin.product.index',compact('all_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $All_category=Category::all();
       
        return view('admin.product.add',compact('All_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
           
            'product_name'=>'required',
            'product_code'=>'required',
            'price'=>'required',
            'category_id'=>'required',
        ]);
        
       
       $product_id= Product::insertGetId($request->except('_token','image') +[ 
            'created_at'=>Carbon::now(),
        ]);

        if($request->hasFile('image')){
          
           $file_name=$product_id.'.'.$request->file('image')->getClientOriginalExtension();
           Image::make($request->file('image'))->resize(100,100)->save(base_path('public/uploads/product/'.$file_name));
           Product::find($product_id)->update([
               'image'=>$file_name,
           ]);
             
      return back();
       
    

        }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::all();
         $product=Product::find($id);
        return view('admin.product.edit' ,compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view('admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       
       
         $product->update($request->except('_token','_method','image'));
        if($request->hasFile('image')){
            if(Product::findOrFail($product->id)->image != 'product_default_image.jpg'){
                $old_file_location='public/uploads/product/'.Product::findOrFail($product->id)->image;
                unlink(base_path($old_file_location));
            }
          
            $file_name=$product->id.'.'.$request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(100,100)->save(base_path('public/uploads/product/'.$file_name));
            $product->findOrFail($product->id)->update([
                'image'=>$file_name,
            ]);
        }




       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
    public function deleteProduct(){
        $delete_product=Product::onlyTrashed()->get();
        return view('admin.product.restore',compact('delete_product'));
    }
    public function restoreProduct($id){
       Product::withTrashed()->find($id)->restore();
        return back();

    }
    public function ForceDelete($id){
        Product::withTrashed()->find($id)->forceDelete();
        return back();

    }
}

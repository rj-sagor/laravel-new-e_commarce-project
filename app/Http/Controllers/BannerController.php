<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   
    {
        // $request->validate([
        //     'banner_name'=>'required',
        //     'banner_description'=>'required|max:250',
        //     'banner_image'=>'mimes:png,jpg,jpeg,gif',
        
        // ]);
         $banner_id= Banner::insertGetId( $request->except('_token','banner_image'));
        if($request->hasFile('banner_image')){
            $upload_image=$request->file('banner_image');
           $Image_name=$banner_id.'.'.$upload_image->getClientOriginalExtension();
           Image::make($upload_image)->resize(1919,500)->save(base_path('public/uploads/banner/'.$Image_name));
           Banner::find($banner_id)->update([
               'banner_image'=>$Image_name,
           ]);
           
        }
        return back()->with('success','Banner add successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

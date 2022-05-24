@extends('layouts.bcakendMater')
@section('title','add banner |')
@section('banner') active show-sub @endsection
@section('add.banner') active @endsection
   
@section('backend_app')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="index.html">Pages</a>
      <span class="breadcrumb-item active">Blank Page</span>
    </nav>
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Home page</h5>
        <p>this is home page</p>
      </div><!-- sl-page-title -->
      
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-dark text-light"><h5>Add Banner</h5></div>
                <div class="card-body">
 
               @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                     @csrf 

                    <div class="mb-3">
                        <label for="">Banner Name</label>
                        <input type="text" name="banner_name"  class="form-control" placeholder="Enter your category">
                    </div>
                    @error('banner_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="banner_description" id="" cols="5" rows="5" class="form-control"></textarea>

                    </div>
                    @error('banner_description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <label for="">Image</label>
                        <input type="file" name="banner_image"  class="form-control" placeholder="Enter your photo">
                    </div>
                    @error('banner_image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-success">submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


    </div>
  </div>

@endsection
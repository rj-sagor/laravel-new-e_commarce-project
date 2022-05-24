@extends('layouts.bcakendMater')
@section('title','add product |')
@section('product') active show-sub @endsection
@section('add.product') active @endsection
   
@section('backend_app')



<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href ="">Rj sagor</a>
        <span class="breadcrumb-item active">products</span>
        <span class="breadcrumb-item active">Add product</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add new products</h6>
         
         <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
             @csrf

          <div class="form-layout">
          @if(session('succes'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('succes') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif 
               
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Products name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" value="{{old('product_name')}}" placeholder="product_name">
                  @error('product_name')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{old('product_code')}}" placeholder="product_code">
                  @error('product_code')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{old('price')}}" placeholder="price">
                  @error('price')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{old('product_quantity')}}" placeholder="product_quantity">
                  @error('product_quantity')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity Alert: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity alert" >
                  @error('product_quantity')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" name="category_id" data-placeholder="Choose category">
                    <option label="Choose category"></option>
                    @foreach($All_category as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                  @error('category_id')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

              <

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Short Description: <span class="tx-danger">*</span></label>
                  <textarea name="short_description" id="summernote" ></textarea>
                  @error('short_description')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2" ></textarea>
                  @error('long_description')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image" >
                  @error('image_one')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

            
             
            </div><!-- row -->

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5">Add Products</button>
             
            </div><!-- form-layout-footer -->

            </form>
          </div><!-- form-layout -->
          
        </div><!-- card -->


    </div>
    </div>
</div>

@endsection
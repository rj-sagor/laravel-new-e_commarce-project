
@extends('layouts.bcakendMater')
@section('title','edit product | ')


@section('product')
active
@endsection
@section('backend_app')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href ="">Rj sagor</a>
        <span class="breadcrumb-item active">products</span>
        <span class="breadcrumb-item active">edit product</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">
    <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update products</h6>
         
         <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
             @csrf
             @method('PUT')

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
                  <input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}" placeholder="product_name">
                  @error('product_name')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" value="{{ $product->product_code }}" placeholder="product_code">
                  @error('product_code')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="price" value="{{ $product->price }}" placeholder="price">
                  @error('price')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity" value="{{ $product->product_quantity }}" placeholder="product_quantity">
                  @error('product_quantity')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity Alert: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="number" name="product_quantity alert" value="{{ $product->product_quantity_alert }}" >
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
                    @foreach($category as $data)
                    <option value="{{$data->id}} " {{ $data->id ==$product->category_id ? "selected" : "" }}> {{$data->category_name}}</option>
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
                  <textarea name="short_description" id="summernote" >{{ $product->short_description }}</textarea>
                  @error('short_description')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Long Description: <span class="tx-danger">*</span></label>
                  <textarea name="long_description" id="summernote2" > {{ $product->long_description }}</textarea>
                  @error('long_description')
                     <strong class="text-danger">{{ $message}}</strong>
                  @enderror
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image" >
                  
                  <label class="form-control-label"></label>
                  <img src="{{ asset('uploads/product') }}/{{ $product->image }}" alt="" height="120px" width="120px">
                </div>
{{--              
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Main image: <span class="tx-danger">*</span></label>
                  <img src="{{ asset('uploads/product') }}/{{ $product->image }}" alt="" height="120px" width="120px">
                </div>
              </div><!-- col-4 --> --}}

            
             
            </div><!-- row -->

            <div class="form-layout-footer mt-3">
              <button class="btn btn-info mg-r-5">Update Product</button>
             
            </div><!-- form-layout-footer -->

            </form>
          </div><!-- form-layout -->
          
        </div><!-- card -->


    </div>
    </div>
</div>

@endsection
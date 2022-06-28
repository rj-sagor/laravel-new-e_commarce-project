

@extends('layouts.bcakendMater')
@section('title','edit coupon |')
@section('coupon') active show-sub @endsection
@section('edit.coupon') active @endsection
   
@section('backend_app')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ route('coupon.create') }}">Add Coupon</a>
      <a class="breadcrumb-item" href="{{ route('coupon.index') }}">view</a>
      <span class="breadcrumb-item active">edit Coupon</span>
    </nav>
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon</h5>
       
      </div><!-- sl-page-title -->
      
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-dark text-light"><h5>Edit Coupon</h5></div>
                <div class="card-body">
 
               @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{ route('coupon.update',$coupon->id) }}" method="post">
                     @csrf 
                      @method("PUT")
                    <div class="mb-3">
                        <label for="">coupon Name</label>
                        <input type="text" name="coupon_name"  class="form-control" value="{{ $coupon->coupon_name }}">
                    </div>
                    @error('coupon_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="">coupon discount</label>
                        <input type="number" name="coupon_discount"  class="form-control" value="{{ $coupon->coupon_discount }}">
                    </div>
                    @error('coupon_discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <label for="">Minimun Purchase</label>
                        <input type="number" name="min_purchase"  class="form-control" value="{{ $coupon->min_purchase }}">
                    </div>
                    @error('min_purchase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <label for="">Validation date</label>
                        <input type="date" name="validatity_till"  class="form-control" value="{{ $coupon->validatity_till }}" >
                    </div>
                    @error('validatity_till')
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
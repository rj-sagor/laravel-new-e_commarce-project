

@extends('layouts.bcakendMater')
@section('title','add coupon |')
@section('coupon') active show-sub @endsection
@section('add.coupon') active @endsection
   
@section('backend_app')

<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">Starlight</a>
      <a class="breadcrumb-item" href="{{ route('coupon.index') }}">View Coupon</a>
      <span class="breadcrumb-item active">add Coupon</span>
    </nav>
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Coupon</h5>
       
      </div><!-- sl-page-title -->
      
<div class="container">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-dark text-light"><h5>Add Coupon</h5></div>
                <div class="card-body">
 
               @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show t" role="alert">
                <strong>{{session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>              
               @endif
               
                 <form action="{{ route('coupon.store') }}" method="post">
                     @csrf 

                    <div class="mb-3">
                        <label for="">coupon Name</label>
                        <input type="text" name="coupon_name"  class="form-control" placeholder="Enter your category">
                    </div>
                    @error('coupon_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    
                    <div class="mb-3">
                        <label for="">coupon discount</label>
                        <input type="number" name="coupon_discount"  class="form-control" placeholder="Coupon discount">
                    </div>
                    @error('coupon_discount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <label for="">Minimun Purchase</label>
                        <input type="number" name="min_purchase"  class="form-control" placeholder="minimum purchase">
                    </div>
                    @error('min_purchase')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="mb-3">
                        <label for="">Validation date</label>
                        <input type="date" name="validatity_till"  class="form-control" >
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
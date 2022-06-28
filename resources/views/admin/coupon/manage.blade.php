@php
    error_reporting(0)
@endphp
@extends('layouts.bcakendMater')
@section('coupon') active show-sub @endsection
@section('manage.coupon') active @endsection
   
@section('backend_app')




<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href ="">Rj sagor</a>
        <span class="breadcrumb-item active">coupon</span>
        <span class="breadcrumb-item active">Manage coupon</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">

    <div class="col-lg-12">
      <div class="container">
      <div class="card mt-4">
          <div class="card-header bg-dark text-light ">
           <h4>view coupon</h4>
          </div>
          <div class="card-body">
          @if(session('succes'))
                  <div class="alert alert-success" role="alert">
                <strong>{{session('succes') }}</strong>
               
              </div>              
               @endif 
            <table class="table table-bordered">
              <thead>
                <th>sl</th>
                <th>coupon name</th>
                <th>Product DisCount</th>
                <th>Minimun Purchase</th>
                <th>Added by</th>
                <th>Created _at</th>
                <th>Action</th>
              

              </thead>
              
            
              @if(session('active'))
                  <div class="alert alert-success" role="alert">
                <strong>{{session('active') }}</strong>
               
              </div>              
               @endif

                 <tbody>  
                  @forelse($coupons as $coupon)
                  <tr>
                     <td>{{ $loop->index +1 }}</td>
                     <td>{{$coupon->coupon_name}}</td>
                      <td>{{$coupon->coupon_discount}}%</td>
                      <td>{{$coupon->min_purchase }}</td>
                      <td>{{$coupon->Coupon_to_user->name}}</td>
                     
                      <td style="color: black;">{{$coupon->created_at}}</td>
                      <td>
                        <a href="{{ route('coupon.edit',$coupon->id) }} " class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <form action="{{ route('coupon.destroy',$coupon->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                      </td>
                    
                  </tr>
                 
                  @empty
                          <tr>
                          <td class="text-danger  text-center" colspan="10">no data added yet</td>
                          </tr>
                         

                  @endforelse

              
             
              
              </tbody>

            </table>
          </div>
        </div>
           
      </div>
        </div>
   

    
     </div>
 </div>  
</div>
        

  




  


@endsection
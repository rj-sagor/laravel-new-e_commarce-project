@extends('layouts.bcakendMater')

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
        <p>Your are a customer</p>
      </div><!-- sl-page-title -->

      <div class="table-responsive">
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>Sl</th>
              <th>Product Name
              </th>
              <th>Product Quantity</th>
              <th>price</th>
              <th>Total</th>
              <th>Delivery Status</th>
              <th>Invioce Download</th>
            </tr>
            
          </thead>
          <tbody>
            @forelse ($order_details as $details )
               <tr>
              
              <td>{{ $loop->index + 1 }}</td>
              <td>{{ $details->Order_details_product->product_name }}</td>
              <td>{{$details->product_quantity  }}</td>
              <td>${{$details->price  }}</td>
              <td>${{$details->price * $details->product_quantity  }}</td>
              <td>{{ $details->Order_details_Order->payment = 2 ? 'Cash On Delivery' : "Pyment_system" }}</td>
              <td><a href="{{ route('order.invoice.dowload',$details->id) }}"> <i class="fa fa-download">Download PDF</i></a></td>
            </tr> 
           
            @empty
              
            @endforelse
             
          </tbody>
          
        </table>
      </div>
    </div>
  </div>
    
@endsection



@extends('layouts.bcakendMater')
@section('product') active show-sub @endsection
@section('manage.product') active @endsection
   
@section('backend_app')




<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href ="">Rj sagor</a>
        <span class="breadcrumb-item active">products</span>
        <span class="breadcrumb-item active">Manage products</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">

    <div class="col-lg-12">
      <div class="container">
      <div class="card mt-4">
          <div class="card-header bg-dark text-light ">
           <h4>Mange Products</h4>
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
                <th>Image</th>
                <th>Product name</th>
                <th>Product Quantity</th>
                <th>price</th>
                <th>Category</th>
                <th>Created _at</th>
                <th>Action</th>
              

              </thead>
              
            
              @if(session('active'))
                  <div class="alert alert-success" role="alert">
                <strong>{{session('active') }}</strong>
               
              </div>              
               @endif 
               
             


              <tbody>
                  
                  @forelse($all_product as $product)
                  <tr>
                     <td>{{ $loop->index +1 }}</td>
                      <td>
                        <img src="{{ asset('uploads/product') }}/{{ $product->image }}" height="50px" width="50px" alt="{{ $product->image }}">
                      </td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_quantity}}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{$product->ProductToCategory->category_name}}</td>
                     
                      <td style="color: black;">{{$product->created_at}}</td>
                      <td>
                        <a href="{{ route('product.show',$product->id) }} " class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <form action="{{ route('product.destroy',$product->id) }}" method="POST">
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
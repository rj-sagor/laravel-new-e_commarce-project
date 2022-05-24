@extends('layouts.bcakendMater')
@section('product') active show-sub @endsection
@section('restore.product') active @endsection
   
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
           <h4>Restore Products</h4>
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
                <th>Deleted _at</th>
                <th>Action</th>
              

              </thead>
              
            
              @if(session('active'))
                  <div class="alert alert-success" role="alert">
                <strong>{{session('active') }}</strong>
               
              </div>              
               @endif 
               
             


              <tbody>
                  
                  @forelse($delete_product as $product)
                  <tr>
                     <td>{{ $loop->index +1 }}</td>
                      <td>
                        <img src="{{ asset('uploads/product') }}/{{ $product->image }}" class="img-fluid" alt="{{ $product->image }}">
                      </td>
                      <td>{{$product->product_name}}</td>
                      <td>{{$product->product_quantity}}</td>
                      <td>{{ $product->price }}</td>
                      <td>{{ $product->ProductToCategory->category_name }}</td>
                     
                      <td style="color: black;">{{$product->deleted_at}}</td>
                      <td>
                       <a href="{{ route('product.restore',$product->id) }}" class="btn btn-info">Restore</a>
                        <a href="{{ route('product.ForceDelete',$product->id) }} " class="btn btn-danger btn-sm" class="alert"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      
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
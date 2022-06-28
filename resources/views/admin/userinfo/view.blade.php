@extends('layouts.bcakendMater')

@section('user_info') active @endsection
   
@section('backend_app')




<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href ="">Rj sagor</a>
        <span class="breadcrumb-item active">users</span>
        <span class="breadcrumb-item active">User info view</span>
    </nav>
    <div class="sl-pagebody">
    <div class="row row-sm">

    <div class="col-lg-12">
      <div class="container">
      <div class="card mt-4">
          <div class="card-header bg-dark text-light ">
           <h4>User information</h4>
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
                <th>User name</th>
                <th>User Email</th>
                <th>User subject</th>
                <th>User massage</th>
                <th>Created _at</th>
                <th>Action</th>
              

              </thead>
              
            
              @if(session('active'))
                  <div class="alert alert-success" role="alert">
                <strong>{{session('active') }}</strong>
               
              </div>              
               @endif 
               
             


              <tbody>
                  
                  @forelse($all_info as $data)
                  <tr>
                     <td>{{ $loop->index +1 }}</td>
                      
                      <td>{{$data->name}}</td>
                      <td>{{$data->email}}</td>
                      <td>{{ $data->subject }}</td>
                      <td>{{ $data->meassage}}</td>
                     
                      <td style="color: black;">{{$data->created_at}}</td>
                      <td>
                        @if ($data->user_file)
                        <a href=" {{ url('user/info/download') }}/{{ $data->id }}" class="btn btn-info btn-sm"><i class="fa fa-download" aria-hidden="true"></i></a>
                          
                        @endif
                        
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
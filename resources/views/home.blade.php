
@extends('layouts.bcakendMater')
@section('title','home | ')

@section('home')
active
@endsection
@section('backend_app')
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
  
    <span class="breadcrumb-item active">home</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Home page</h5>
      <p>this is home page</p>
    </div><!-- sl-page-title -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-dark text-white">admin details</div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                  <th>Sl no</th>
                <th>Id no</th>
                <th>Name</th>
                <th>Email</th>
     
                <th>Create a time</th>
              </thead>
              <tbody>
                  @foreach ($users as $user )
                  <tr>
                      {{-- <td>{{ $loop->index + 1 }}</td> --}}
                      <td>{{ $users->firstitem()+$loop->index }}</td>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                    
                      <td>{{ $user->created_at }}</td>
                  </tr>
                      
                  @endforeach
             
                
              
              </tbody>

            </table>
            {{ $users->links() }}
          </div>

          </div>
          
          
         
          </div>
        </div>
      </div>
    </div>
  </div><!-- sl-pagebody -->

@endsection
    


@extends('layouts.bcakendMater')
@section('title','Edit_profile | ')
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
        <p>this is home page</p>
      </div><!-- sl-page-title -->
      <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header card-header-default"><h5>Name Edit</h5></div>
                    <div class="card-body">
                        @if (session('success_status'))
                        <div class="alert alert-success">
                            {{ session('success_status') }}
                        </div>
                            
                        @endif
                       
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                            
                        @endif
                       
                     <form action="{{ url('edit/post/name') }}" method="post">
                         @csrf 
    
                        <div class="mb-3">
                            <input type="text" name="name"  class="form-control" placeholder="Enter your name" value="{{ Auth::user()->name }}">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-warning">change Name</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="card">
                    <div class="card-header card-header-default"><h5>Profile photo edit</h5></div>
                    <div class="card-body">
                       @error(session('profile_photo'))
                       <div class="alert alert-danger">
                           {{ $message }}
                       </div>
                           
                       @enderror
                       
                        @if (session('photo'))
                        <div class="alert alert-success">
                            {{ session('photo') }}
                        </div>
                            
                        @endif
                       
                     <form action="{{ url('profile/photo/edit') }}" method="post" enctype="multipart/form-data">
                         @csrf 
    
                        <div class="mb-3">
                            <input type="file" name="profile_photo"  class="form-control" placeholder="Enter your photo">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-success">change phpto</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                      
    
                    
                </div>
            </div>
    
        </div>
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="card">
                    <div class="card-header card-header-default bg-primary"><h5>Password Change</h5></div>
                    <div class="card-body">
                        @error("password")
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                          @enderror
    
                       
                        @if (session('passwordErr'))
                        <div class="alert alert-danger">
                            {{ session('passwordErr') }}
                        </div>
                             @endif
    
                        @if (session('password'))
                        <div class="alert alert-success">
                            {{ session('passwordErr') }}
                        </div>
                         @endif
                       
                     <form action="{{ url('edit/password') }}" method="post">
                         @csrf 
    
                        <div class="mb-3">
                            <input type="password" name="old_password"  class="form-control" placeholder="Enter old password">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password"  class="form-control" placeholder="Enter new password "id="password_in" >
                            <input type="checkbox" onclick="showpassword() ">Show Password
                            <script>
                                function showpassword() {
                               var x = document.getElementById("password_in");
                               if (x.type === "password") {
                                   x.type = "text";
                               } else {
                                   x.type = "password";
                               }
                               }
                       </script>
                        </div>
                        
                        <div class="mb-3">
                            <input type="password" name="password_confirmation"  class="form-control" placeholder="Enter conform password" >
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-sm btn-warning">change Name</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
                      
    
                    
                </div>
            </div>
    
        </div>
    </div>
    </div>
  </div>





@endsection


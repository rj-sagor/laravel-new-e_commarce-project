
@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header"><h5>Name Edit</h5></div>
                <div class="card-body">
                    @error("name")
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                    
                        
                    @enderror
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
        
                  

                
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="card">
                <div class="card-header"><h5>Password Change</h5></div>
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
@endsection
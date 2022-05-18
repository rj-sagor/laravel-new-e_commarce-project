@extends('layouts.bcakendMater')
@section('category')
active
    
@endsection

@section('backend_app')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
      <a class="breadcrumb-item" href="{{ route('add/category') }}">category</a>
      <span class="breadcrumb-item active">Edit category</span>
    </nav>
  
    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Home page</h5>
        <p>this is home page</p>
      </div><!-- sl-page-title -->
      <div class="container">
        <div class="row">
            <div class="col-lg-4 m-auto">
                <div class="card">
                    <div class="card-header bg-success"><h5>category Upload</h5></div>
                    <div class="card-body">
                        @if (session('succes'))
                        <div class="alert alert-success">
                            {{ session('succes') }}
                        </div>
                            
                        @endif
                       
    
                        <div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ url('add/category') }}">add category</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">{{ $all_data->category_name }}</li>
                                </ol>
                              </nav>
                        </div>
                   
                     <form action="{{ url('update/category') }}/{{ $all_data->id }}" method="post">
                         @csrf 
    
                        <div class="mb-3">
                            <input type="text" name="category_name"  class="form-control" placeholder="Enter your category" value="{{ $all_data->category_name }}">
                        </div>
                        
    
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
    </div>s
    </div>
  </div>


@endsection
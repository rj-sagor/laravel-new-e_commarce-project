@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4 m-right">
            <div class="card">
                <div class="card-header bg-success"><h5>category Upload</h5></div>
                <div class="card-body">

                  
               
                 <form action="#" method="post">
                     @csrf 

                    <div class="mb-3">
                        <input type="text" name="category_name"  class="form-control" placeholder="Enter your category">
                    </div>
                    @error('category_name')
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
@endsection
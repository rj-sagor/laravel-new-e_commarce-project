@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4 m-left">
            <div class="card">
                <div class="card-header bg-success"><h5>category Upload</h5></div>
                <div class="card-body">
                    @if (session('category'))
                    <div class="alert alert-success">
                        {{ session('category') }}
                    </div>
                        
                    @endif
                   

                  
               
                 <form action="{{ url('uploads/category') }}" method="post">
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
        
                  

                    <div class="col-lg-8">
                        <div class="container">
                        <div class="card mt-4">
                            <div class="card-header bg-success text-center">
                             <h4>Category list</h4>
                            </div>
                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                    <th>Sl no</th>
                                  <th>Category_name</th>
                                  <th>category created at</th>
                                  <th>status</th>
                       
                                  <th>Create a time</th>
                                </thead>
                                <tbody>
                                    @foreach ($all_category as $category )
                                        
                                    
                                    <tr>
                                       <td>{{ $all_category->firstitem()+$loop->index }}</td>
                                       <td>{{ $category->category_name }}</td>
                                       <td>{{ App\User::find($category->user_id) }}</td>
                                       <td>{{ $category->status }}</td>
                                       <td>{{ $category->created_at }}</td>
                                      
                                        
                                    </tr>
                                    @endforeach
                                
                               
                                  
                                
                                </tbody>
                  
                              </table>
                              {{ $all_category->links() }}
                             
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
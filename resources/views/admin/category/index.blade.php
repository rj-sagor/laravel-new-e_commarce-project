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

                             @if (session('success'))
                             <div class="alert alert-danger">
                                 {{ session('success') }}

                             </div>
                                 
                             @endif
                            </div>
                            <form action="{{ url('mark\delete') }}" method="post">
                              @csrf

                            <div class="card-body">
                              <table class="table table-bordered">
                                <thead>
                                  <th>mark</th>
                                    <th>Sl no</th>
                                  <th>Category_name</th>
                                  <th>category created at</th>
                                  <th>status</th>
                       
                                  <th>Create a time</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($all_category as $category )
                                        
                                    
                                    <tr>
                                      <td><input type="checkbox" name="category_id[]" value={{ $category->id }}></td>
                                       <td>{{ $all_category->firstitem()+$loop->index }}</td>
                                       <td>{{ $category->category_name }}</td>
                                       <td>{{ $category->categorytouser->name }}</td>
                                       <td>{{ $category->status }}</td>
                                       <td>{{ $category->created_at }}</td>
                                      <td>
                                          <a href="{{ url('edit\category') }}\{{ $category->id }} "type="button" class="btn btn-success btn-sm">Edit</a>
                                          <a href="{{ url('delete/category')}}\{{ $category->id }}" type="button" class="btn btn-danger btn-sm">Delete</a>

                                      </td>
                                        
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="100" class="text text-danger">no more data</td>
                                    </tr>
                                    @endforelse
                                  
                                </tbody>
                  
                              </table>
                          
                              {{ $all_category->links() }}
                             <button class="btn btn-sm btn-danger">submit</button>
                            </div>
                          </form>
                           

                            
                          </div>
                             
                        </div>
                          </div>

                </div>

                <div class="col-lg-9 m-auto">
                    <div class="container">
                    <div class="card mt-4 m-right">
                        <div class="card-header bg-danger text-center">
                         <h4>Deleted Category list</h4>
                        </div>
                        
                                
                          
                          <table class="table table-bordered">
                            <thead>
                                <th>Sl no</th>
                              <th>Category_name</th>
                              <th>category created at</th>
                              <th>status</th>
                   
                              <th>Create a time</th>
                              <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($delete_category as $category )
                                    
                                
                                <tr>
                                   <td>{{ $delete_category->firstitem()+$loop->index}}</td>
                                   <td>{{ $category->category_name }}</td>
                                   <td>{{ $category->categorytouser->name }}</td>
                                   <td>{{ $category->status }}</td>
                                   <td>{{ $category->created_at }}</td>
                                  <td>
                                    <a href="{{ url('force\delete\category') }}\{{ $category->id }} "type="button" class="btn btn-success btn-sm">F.D</a>
                                    <a href="{{ url('restore/category')}}\{{ $category->id }}" type="button" class="btn btn-danger btn-sm">Restore</a>

                                  </td>
                                    
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100" class="text text-danger">no more data</td>
                                </tr>
                                @endforelse
                            
                           
                              
                            
                            </tbody>
              
                          </table>
                          {{ $delete_category->links() }}
                         
                         
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
@extends('layouts.bcakendMater')
@section('title','Add_category | ')


@section('category')
active
@endsection
@section('backend_app')

<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">

    <a class="breadcrumb-item" href="{{ url('home') }}">home</a>
    <span class="breadcrumb-item active">Category</span>
  </nav>

  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Home page</h5>
      <p>this is home page</p>
    </div><!-- sl-page-title -->
    <div class="container">
      <div class="row">
          <div class="col-lg-3 m-left">
              <div class="card">
                  <div class="card-header bg-success"><h5>category Upload</h5></div>
                  <div class="card-body">
                      @if (session('category'))
                      <div class="alert alert-success">
                          {{ session('category') }}
                      </div>
                          
                      @endif
                     
  
                    
                 
                   <form action="{{ url('category/uploads') }}" method="post" enctype="multipart/form-data">
                       @csrf 
  
                      <div class="mb-3">
                          <input type="text" name="category_name"  class="form-control" placeholder="Enter your category">
                      </div>
                      <div class="mb-3">
                        <input type="file" name="category_photo"  class="form-control" placeholder="photo">
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
          
                    
  
                      <div class="col-lg-9">
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
                                <table class="table table-bordered ">
                                  <thead>
                                    <th>mark</th>
                                      <th>Sl no</th>
                                    <th>Category_name</th>
                                    <th>category created at</th>
                                    <th>image</th>
                         
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
                                         <td>
                                          <img src="{{ asset('uploads/category') }}/{{ $category->category_photo }}" class="img-fluid" alt="no found">
                                         </td>
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
                                @if ($all_category->count()>0)
                               <button class="btn btn-sm btn-danger">submit</button>

                                  
                                @endif
                              </div>
                            </form>
                             
  
                              
                            </div>
                               
                          </div>
                            </div>
  
                  </div>
  
                  <div class="col-lg-12 m-auto">
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
  </div>
</div>

@endsection
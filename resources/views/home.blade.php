@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('laravel') }}
                <h1>total users:: {{ $total_user }}</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-lg-11">
                        <div class="container">
                        <div class="card mt-4">
                            <div class="card-header bg-success text-center">
                             <h4>Upload data</h4>
                            </div>
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
        </div>
    </div>
</div>
@endsection

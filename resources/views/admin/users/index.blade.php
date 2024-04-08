@extends('layout')

@section('title', 'Admin Panel')
    
@section('content')
    <div class="row">
      
        <div class="col-3">
           @include('admin.left-side')
        </div>

        <div class="col-9">
         <h1>We-share Users</h1>
         <div class="container mt-3">
            <table class="table table-bordered table-striped">
              <thead class="table-dark">
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Joined At</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->created_at->toDateString()}}</td>
                  <td>
                        <a href="{{route('users.show', $user->id)}}">View</a>
                    
                        <a href="{{route('users.edit', $user->id)}}">Edit</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

    @if ($users->hasMorePages())
    <div class="text-center">
        <a href="{{ $users->nextPageUrl() }}" class="btn btn-success ">Load More User</a>
    </div>
    @endif
            
          </div>
        </div>
           
      </div>
@endsection
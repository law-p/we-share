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
                  <th>User</th>
                  <th>Content</th>
                  <th>Craeted At</th>
                  <th>Options</th>

                </tr>
              </thead>
              <tbody>
                @foreach ($shares as $share)
                <tr>
                  <td>{{$share->user->name}}</td>
                  <td>{{$share->content}}</td>
                  <td>{{$share->created_at->toDateString()}}</td>
                  <td>
                    <a href="{{ route('shares.show', $share) }}">View</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

    @if ($shares->hasMorePages())
    <div class="text-center">
        <a href="{{ $shares->nextPageUrl() }}" class="btn btn-success">Load More Content</a>
    </div>
    @endif
            
          </div>
        </div>
           
      </div>
@endsection
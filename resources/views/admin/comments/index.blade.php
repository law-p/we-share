@extends('layout')

@section('title', 'Admin Panel')

@section('content')
    <div class="row">
        <div class="col-3">
           @include('admin.left-side')
        </div>
        <div class="col-9">
         <h1>Comments</h1>
         <div class="container mt-3">
            <table class="table table-bordered table-striped">
              <thead class="table-dark">
                <tr>
                  <th>User</th>
                  <th>Comments</th>
                  <th>Craeted At</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comments as $comment)
                <tr>
                  <td>{{ $comment->user->name }}</td>
                  <td>{{ $comment->content }}</td>
                  <td>{{ $comment->created_at->toDateString() }}</td>
                  <td>
                      <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                  </td>
              </tr>

                @endforeach
                @if(session('flash-msg'))
                <div class="alert alert-success">
                  {{ session('flash-msg') }}
                </div>
                @endif
              </tbody>
            </table>
            @if ($comments->hasMorePages())
            <div class="text-center">
              <a href="{{ $comments->nextPageUrl() }}" class="btn btn-success">Load More Comments</a>
            </div>
            @endif
          </div>
        </div>  
      </div>

@endsection
@extends('layout')
@section('title', 'Admin Panel')
    
@section('content')
    <div class="row">
      
        <div class="col-3">
           @include('admin.left-side')
        </div>

        <div class="col-9">
         <h1>Admin dashboard</h1>
        </div>
           
      </div>
@endsection
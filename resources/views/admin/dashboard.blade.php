@extends('layout')
@section('title', 'Admin Panel')
    
@section('content')
    <div class="row">
      
        <div class="col-3">
           @include('admin.left-side')
        </div>

        <div class="col-9">
         <h1>Admin dashboard</h1>
         <div class="container mt-4">
          <div class="row">
            <div class="col-md-4">
              @include('admin/admin-card', [
                'title' => 'Total Users',
                'icon' => 'fa-solid fa-users',
                'data' => $totalUsers,
              ])
            </div>

            <div class="col-md-4">
              @include('admin/admin-card', [
                'title' => 'Total Comments',
                'icon' => 'fa-solid fa-comments text-center',
                'data' =>  $totalComment,
              ])
            </div>

            <div class="col-md-4">
              @include('admin/admin-card', [
                'title' => 'Total Post',
                'icon' => 'fa-solid fa-message',
                'data' => $totalShare,
              ])
            </div>

            {{-- <div class="col-md-4"> <i class="fa-solid fa-message"></i>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> <i class="fa-solid fa-comments"></i> Total Comments</h5>
                  <p class="card-text fs-2 text-center">10</p>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Total Content</h5>
                  <p class="card-text fs-2 text-center">50</p> 
                </div>
              </div>
            </div> --}}

          </div>
        </div>
        </div>
           
      </div>
@endsection
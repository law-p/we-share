@extends('layout')

@section('content')

<div class="row">
    <div class="col-3">
        @include('left-side')
    </div>
    <div class="col-6">
        @include('successmsg')
        <hr>
        
        <div class="mt-3">

           @include('card')
        
        </div>
     
    </div>
    <div class="col-3">
        @include('search')
        @include('follow')
    </div>
</div>

@endsection
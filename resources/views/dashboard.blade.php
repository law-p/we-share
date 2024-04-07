@extends('layout')

@section('title', 'Home') 

@section('content')
    <div class="row">
        <div class="col-3">
           @include('left-side')
        </div>
        <div class="col-6">
            @include('successmsg')
          
            @include('submit_share')
            <hr>
            @if (count($shares) > 0)
            @foreach ($shares as $share)
            <div class="mt-3">

                @include('card')

            </div>
        @endforeach
            @else
                <h4>No Result Found! </h4>
            @endif
            
            <div class="mt-3">
                {{ $shares->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('search')
            @include('follow')
        </div>
    </div>
@endsection
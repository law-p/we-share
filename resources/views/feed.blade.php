@extends('layout')

@section('content')
    <div class="row">
        <div class="col-3">
           @include('left-side')
        </div>
        <div class="col-6">
            @include('successmsg')
          
            <h4 class=" card mb-3 text-center">Feeds</h4>
            <hr>
            @if (count($shares) > 0)
            @foreach ($shares as $share)
            <div class="mt-3">

                @include('card')

            </div>
        @endforeach
            @else
                <h4>Follow Someone To See Their Updates! </h4>
            @endif
            
            <div class="mt-3">
                {{ $shares->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('search')
        </div>
    </div>
@endsection
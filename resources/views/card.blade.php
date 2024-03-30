<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$share->user->getImageURL() }}" alt="{{$share->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{route('users.show', $share->user->id)}}"> {{$share->user->name}}
                        </a></h5>
                </div>
            </div>
         
            <div>
                @auth
               <form method="POST" action="{{route('weshare.destroy', $share->id)}}">
                @method('delete')
                @csrf
                <a href="{{route('weshare.edit', $share->id)}}" class="mx-2">Edit</a>
                <button class="btn btn-danger btn-sm">Delete</button>
                <a href="{{route('weshare.show', $share->id)}}" class="mx-2">View</a>
               </form>
               @endauth
            </div>
           
        </div>
       
    </div>
   
    <div class="card-body">
        @if ($editting ?? false)
        <form action="{{route('weshare.update', $share -> id)}}" method="post">
            @csrf
            @method('put')
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3">{{$share -> content}}</textarea>
        </div>
        @error('content')
       
            <span class="fs-6 text-success nt-2">{{$message}}</span>

        @enderror
        <div class="">
            <button class="btn btn-dark"> Update </button>
        </div>
       </form>
        @else
        <p class="fs-6 fw-light text-muted">
            {{$share -> content}}
        </p>
        @endif
        
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{$share -> likes}} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{$share -> created_at}} </span>
            </div>
        </div>
       @include('comments')
    </div>
   
</div>
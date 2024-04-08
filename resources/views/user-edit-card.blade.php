<div class="card">
    <div class="px-3 pt-4 pb-2">
    <form enctype="multipart/form-data" method="POST" action="{{route('users.update', $user->id)}}">
        @csrf
        @method('put')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user -> getImageURL()}}" alt="Avatar">
                        <input name="name" value="{{$user->name}}" type="text" class="form-control">
                        @error('name')
                         <span class="fs-6 text-danger nt-2">{{$message}}</span>
                         @enderror
            </div>
            <div class="mx-3">
              @auth()
              @if (Auth::id() === $user -> id)
              <a href="{{route('users.show', $user->id)}}">View</a>
              @endif
              @endauth
            </div>
        </div>
        <div class="mx-2">
            <label for="">Profile Pic</label>
            <input name="image" class="form-control" type="file">
            @error('image')
            <span class="fs-6 text-danger nt-2">{{$message}}</span>
            @enderror
        </div>      
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <div class="mb-3">
                <textarea name="bio" class="form-control" id="bio" rows="3"> {{$user->bio}} </textarea>
                @error('bio')
                <span class="fs-6 text-success nt-2">{{$message}}</span>
                @enderror
            </div>
            <button class="btn btn-success btn-sm mb-3">Save</button>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span>{{$user->followers->count()}}</a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fa-regular fa-comments me-1">
                    </span> {{$user->shares->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span>  {{$user->comments->count()}}</a>
            </div>
        </div>
     </form>
    </div>
</div>

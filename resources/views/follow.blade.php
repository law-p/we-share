<div class="card mt-3">
    <div class="card-header pb-0">
        <h5 class="">Who To Follow</h5>
    </div>
    <div class="card-body">
       @foreach ($TopUser as $user)
       <div class="hstack gap-2 mb-3">
        <div class="avatar">
            <a href="#!"><img style="width: 50px" class="avatar-img rounded-circle"
                    src="{{$user->getImageURL()}}" alt="{{$user->name}}"></a>
        </div>
        <div class="overflow-hidden">
            <a class="mb-0" href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
        </div>
    </div>
       @endforeach
        
    </div>
</div>
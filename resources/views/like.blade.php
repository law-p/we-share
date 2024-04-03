<div>

  @auth
  @if (Auth::user()->likeShare($share))
  <form method="POST" action="{{route('shares.unlike', $share->id)}}">
      @csrf
      <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
         unlike </span> {{$share -> likes()->count()}} 
     </button>
     </form>
  @else
  <form method="POST" action="{{route('shares.like', $share->id)}}">
      @csrf
      <button type="submit" class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
          like</span> {{$share -> likes()->count()}} 
     </button>
     </form>
  @endif
  @endauth

  
@guest
<button class="fw-light nav-link fs-6"> <span class="far fa-heart me-1">
    like</span> {{$share -> likes()->count()}} 
</button>
@endguest
   
</div>
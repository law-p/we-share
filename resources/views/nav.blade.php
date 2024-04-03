<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="{{(Route::is('login')) ? 'text-white bg-success' : '' }}" href="{{route('login')}}">Login</a>
                </li>
                <span class="mx-2"></span>
                <li class="nav-item">
                    <a class="{{(Route::is('register')) ? 'text-white bg-success' : '' }}" href="{{route('register')}}">Register</a>
                </li>
                @endguest
                
                @auth
                @if (Auth::user()->is_admin)
                <li class="nav-item">
                   <button class="btn btn-danger btn-sm"> <a class="nav-link text-white" href="{{route('admin.dashboard')}}"><span class="mx-2 text-dark"></span>Go To Admin Dashboard</a></button>
                </li>
                @endif
                <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}"><span class="mx-2"></span>{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                  <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Logout</button>
                  </form>
                    </li>
                @endauth
                
            </ul>
        </div>
    </div>
</nav>
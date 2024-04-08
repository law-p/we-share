@auth
<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class=" nav-link {{(Route::is('admin.dashboard')) ? 'text-white bg-primary rounded' : '' }}" 
                href="{{route('admin.dashboard')}}">
                <span>Home</span>
               </a>
            </li>

            <li class="nav-item">
                <a class="{{(Route::is('admin.users')) ? 'text-white bg-primary rounded' : '' }} nav-link" 
                href="{{route('admin.users')}}">
                <span>Users</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{(Route::is('admin.shares')) ? 'text-white bg-primary rounded' : '' }} nav-link" 
                href="{{route('admin.shares')}}">
                <span>Users Content</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="{{(Route::is('admin.destroy')) ? 'text-white bg-primary rounded' : '' }} nav-link" 
                href="{{route('admin.destroy')}}">
                <span>Comments</span>
                </a>
            </li>
            
        </ul>
    </div>
    
</div>
@endauth

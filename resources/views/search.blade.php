<div class="card">
    <div class="card-header pb-0 border-0">
        <h5 class="">Search</h5>
    </div>
    <div class="card-body">
       <form method="GET" action="{{route('dashboard')}}">
        <input value="{{request('search', '')}}" placeholder="search...
        " class="form-control w-100" type="text"
            name="search">
        <button class="btn btn-dark mt-2"> Search</button>
       </form>
    </div>
</div>
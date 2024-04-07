@extends('layout')
@section('title', 'Register')
@section('content')
    

 <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <form class="form mt-5"  action="{{ route('register') }}" method="post">
                    @csrf
                    <h3 class="text-center text-dark">Register</h3>
                    <div class="form-group">
                        <label for="name" class="text-dark">Name:</label><br>
                        <input type="name" name="name" class="form-control">
                        @error('share')
   
                        <span class="fs-6 text-danger nt-2">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label><br>
                        <input type="email" name="email" class="form-control">
                        @error('email')
   
                        <span class="fs-6 text-danger nt-2">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="password" class="text-dark">Password:</label><br>
                        <input type="password" name="password" class="form-control">
                        @error('password')
   
                        <span class="fs-6 text-danger nt-2">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="confirm-password" class="text-dark">Confirm Password:</label><br>
                        <input type="password" name="password_confirmation" class="form-control">
                        @error('password_confirmation')
   
                        <span class="fs-6 text-danger nt-2">{{$message}}</span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember-me" class="text-dark"></label><br>
                        <input type="submit" class="btn btn-dark btn-md">
                    </div>
                    <div class="text-right mt-2">
                        <a href="/login" class="text-dark">Login here</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection

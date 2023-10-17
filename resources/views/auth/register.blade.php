@extends('layouts.main')

@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="" method="post">
                @csrf
                <p class="text-center text-dark fs-1">Register</p>
                <div class="form-group">
                    <label for="email" class="text-dark">Email:</label><br>
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">Confirm Password:</label><br>
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group text-center">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="Register">
                </div>
                <div class="text-right mt-2 text-center">
                    <a href="/login" class="text-dark">Login here</a>
                </div>
            </form>
        </div>
    </div>

@endsection

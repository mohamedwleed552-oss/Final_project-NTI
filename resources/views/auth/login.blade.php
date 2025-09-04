@extends('layouts.app')

@section('title', 'Login ')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-start">
            <div class="card-header">
                <h4 class="text-start">Login</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="{{ route('register') }}" class="btn btn-link">Create New Account</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
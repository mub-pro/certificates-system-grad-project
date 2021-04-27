@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row d-flex justify-content-evenly"">
        <div class="col-5 mg">
            <form action="{{ route('login.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email')border-danger @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password')border-danger @enderror" id="password" name="password">
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                @if (session('status'))
                    <h6 class="mb-5 text-center text-danger">Invalid login details</h3>
                @endif
                <div class="mb-5 mt-5 fw-light"><a href="{{ route('register.index') }}">Forgot Your Password ?</a></div>
                <div class="mb-5 mt-5 fw-light"><a href="{{ route('register.index') }}">Creare New Account</a></div>

            </form>
        </div>
        <div class="col-4 mg">
            <img src="/img/signup.png" alt="login" width="90%">
        </div>
    </div>
</div>
@endsection
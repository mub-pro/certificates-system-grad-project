@extends('layouts.dashboard')

@section('wrap')

<style>
    .xx{
        margin-left: 20%;
    }
</style>
<div class="xx mg tabcontent w-50">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control @error('first_name')border-danger @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control @error('last_name')border-danger @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email')border-danger @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password')border-danger @enderror" id="password" name="password">
                    @error('password')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>
        </div>
        <div class="mb-5">
                <select id="role_id" name="role" class="form-select w-25" aria-label="Default select example">
                    <option value="">Role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    
</div>
@endsection
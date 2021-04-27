@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">Users</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua</p>
    <div class="d-flex mb-5">
        <input type="search" name="search" class="form-control w-25 mx-5" placeholder="search">
        @if (Auth::user()->role->role_name == 'admin')
        <a href="{{route('users.create')}}" class="btn btn-info">Add New user</a>
        @endif
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->role->role_name }}</td>
                <td><a href="{{route('users.show', $user->id)}}" class="text-decoration-none">view</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
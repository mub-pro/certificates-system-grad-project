@extends('layouts.dashboard')

@section('wrap')
<style>
    .size {
        font-size: .9rem;
    }
</style>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">Users</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
        ut labore et dolore magna aliqua</p>
    <div class="d-flex mb-5">
        <a href="{{route('users.create')}}" class="btn btn-info">Add New user</a>

    </div>
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif

    <table class="table table-bordered size">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User Id</th>
                <th scope="col">Name</th>
                <th scope="col">Role</th>
                <th scope="col">College</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                <td>{{ $user->role->role_name }}</td>
                <td>
                    @isset($user->college->college_name)
                    {{$user->college->college_name}}
                    @endisset
                    @empty($user->college->college_name)
                        -
                    @endempty
                </td>
                <td>
                    <span>
                        <form action="{{route('users.destroy', $user->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete {{$user->first_name}}?')" type="submit" class="btn p-0 text-danger size">
                                delete
                            </button>
                        </form>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
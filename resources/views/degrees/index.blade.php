@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">Degrees</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    <div class="d-flex mb-5">
        <a href="{{route('degree.create')}}" class="btn btn-info">Add New Degree</a>
    </div>

    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($degrees as $degree)
            <tr>
                <td scope="row">{{ $degree->id }}</td>
                <td>{{ $degree->degree_name }}</td>
                <td>
                    <span>
                        <form action="{{route('degree.destroy', $degree->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete {{$degree->degree_name}}?')" type="submit" class="btn p-0 text-danger size">
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
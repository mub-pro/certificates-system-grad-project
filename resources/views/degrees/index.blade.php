@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
            <div class="mb-4 fs-2 fw-bold">Degrees</div>
            <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
            <div class="d-flex mb-5">
                <input type="search" name="search" class="form-control w-25 mx-5" placeholder="search">
                <a href="{{route('degree.create')}}" class="btn btn-info">Add New Degree</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($degrees as $degree)
                    <tr>
                        <td scope="row">{{ $degree->id }}</td>
                        <td>{{ $degree->degree_name }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
</div>
@endsection
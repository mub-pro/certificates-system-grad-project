@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
            <div class="mb-4 fs-2 fw-bold">Colleges</div>
            <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
            <div class="d-flex mb-5">
                <a href="{{route('college.create')}}" class="btn btn-primary">Add New College</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($colleges as $college)
                    <tr>
                        <td scope="row">{{ $college->id }}</td>
                        <td>{{ $college->college_name }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
@endsection
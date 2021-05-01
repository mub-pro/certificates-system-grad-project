@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">Documents</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    <div class="d-flex mb-5">
        <input type="search" name="search" class="form-control w-25 mx-5" placeholder="search">
        @if (Auth::user()->role->role_name == 'admin')
        <a href="{{route('documents.create')}}" class="btn btn-info">Add New Document</a>
        @endif
    </div>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Document id</th>
                <th scope="col">Document</th>
                <th scope="col">Type</th>
                @if (Auth::user()->role->role_name == 'admin')
                    <th scope="col">Owner</th>
                @endif
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td scope="row">{{ $document->id }}</td>
                <td>{{ $document->document_name }}</td>
                <td>{{ $document->document_type->document_type_name }}</td>
                @if (Auth::user()->role->role_name == 'admin')
                    <td>{{ $document->user->first_name }} - {{ $document->user->last_name }}</td>
                @endif
                <td><a href="{{route('documents.show', $document->id)}}" class="text-decoration-none">view</a></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
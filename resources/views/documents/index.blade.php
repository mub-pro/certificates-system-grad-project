@extends('layouts.dashboard')

@section('wrap')

<style>
    .size {
        font-size: .9rem;
    }
</style>
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">Documents</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    <div class="d-flex mb-5">
        @if (Auth::user()->role->role_name == 'admin')
        <a href="{{route('documents.create')}}" class="btn btn-info">Add New Document</a>
        @endif
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
                <th scope="col">Document id</th>
                <th scope="col">Document</th>
                <th scope="col">Type</th>
                @if (Auth::user()->role->role_name == 'admin')
                <th scope="col">Owner</th>
                @endif
                <th scope="col">View</th>
                @if (Auth::user()->role->role_name == 'admin')
                <th scope="col">Action</th>
                <th scope="col">degree</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{ $document->id }}</td>
                <td>{{ $document->document_name }}</td>
                <td>{{ $document->document_type->document_type_name }}</td>
                @if (Auth::user()->role->role_name == 'admin')
                <td>{{ $document->user->first_name }} - {{ $document->user->last_name }}
                </td>
                @endif
                <td><a href="{{route('documents.show', $document->id)}}" class="text-decoration-none">view</a></td>
                @if (Auth::user()->role->role_name == 'admin')
                <td>
                    <span>
                        <form action="{{route('documents.destroy', $document->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure you want to delete {{$document->document_name}}?')" type="submit" class="btn p-0 text-danger size">
                                delete
                            </button>
                        </form>
                    </span>
                </td>
                <td>
                    @isset($document->degree->degree_name)
                        {{$document->degree->degree_name}}
                    @endisset
                    @empty($document->degree->degree_name)
                        -
                    @endempty
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
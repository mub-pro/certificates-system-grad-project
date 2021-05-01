@extends('layouts.dashboard')

@section('wrap')
<style>
    .xx {
        margin-left: 20%;
    }
</style>

<div class="xx mg tabcontent w-50">
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <label for="document_name" class="form-label">Document Name</label>
                    <input type="text" class="form-control @error('document_name')border-danger @enderror" id="document_name" name="document_name" value="{{ old('document_name') }}">
                    @error('document_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <label for="document_description" class="form-label">Document Description</label>
                    <input type="text" class="form-control @error('document_description')border-danger @enderror" id="document_descriptio" name="document_description" value="{{ old('document_description') }}">
                    @error('document_description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-4">
                    <select name="student" class="form-select" aria-label="Default select example">
                        <option value="">Student</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name }}</option>
                        @endforeach
                    </select>
                    @error('student')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <select name="degree" class="form-select" aria-label="Default select example">
                        <option value="">Degree</option>
                        @foreach($degrees as $degree)
                        <option value="{{ $degree->id }}">{{ $degree->degree_name }}</option>
                        @endforeach
                    </select>
                    @error('degree')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-4">
                    <select name="type" class="form-select" aria-label="Default select example">
                        <option value="">Type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->document_type_name }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Document File</label>
                    <input name="pdf_file" class="form-control" type="file" id="formFile">
                    @error('pdf_file')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

@endsection
@extends('layouts.dashboard')

@section('wrap')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <form action="{{ route('documents.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3">
                <label for="document_name" class="form-label">Document Name</label>
                <input type="text" class="w-25 form-control @error('document_name')border-danger @enderror" id="document_name" name="document_name" value="{{ old('document_name') }}">
                @error('document_name')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="document_description" class="form-label">Document Description</label>
                <input type="text" class="w-25 form-control @error('document_description')border-danger @enderror" id="document_descriptio" name="document_description" value="{{ old('document_description') }}">
                @error('document_description')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-5">
                <select name="student" class="form-select w-25" aria-label="Default select example">
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
            <div class="mb-5">
                <select name="degree" class="form-select w-25" aria-label="Default select example">
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
            <div class="mb-5">
                <select name="type" class="form-select w-25" aria-label="Default select example">
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
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    $(function() {

        $("#student li a").click(function() {

            $(".student").text($(this).text());
            $(".student").val($(this).text());
            console.log($(".student").val());
        });

    });
</script>
@endsection
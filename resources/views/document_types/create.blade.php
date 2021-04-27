@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
<form action="{{ route('type.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="document_type_name" class="form-label">Dcoument Type Name</label>
                            <input type="text" class="w-25 form-control @error('document_type_name')border-danger @enderror" id="document_type_name" name="document_type_name" value="{{ old('document_type_name') }}">
                            @error('document_type_name')
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
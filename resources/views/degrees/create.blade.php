@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
<form action="{{ route('degree.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="degree_name" class="form-label">Degree Name</label>
                            <input type="text" class="w-25 form-control @error('degree_name')border-danger @enderror" id="degree_name" name="degree_name" value="{{ old('degree_name') }}">
                            @error('degree_name')
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
@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
<form action="{{ route('college.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="college_name" class="form-label">College Name</label>
                            <input type="text" class="w-25 form-control @error('college_name')border-danger @enderror" id="college_name" name="college_name" value="{{ old('college_name') }}">
                            @error('college_name')
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
@extends('layouts.dashboard')

@section('wrap')

<style>
    .xx {
        margin-left: 20%;
    }
</style>
<div class="xx mg tabcontent w-50">
    <div class="mb-4 fs-2 fw-bold">
        {{$account->first_name}} {{$account->last_name}}
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
    @endif
    <form action="{{ route('users.update', $account->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control @error('first_name')border-danger @enderror" id="first_name" name="first_name" value="{{$account->first_name}}">
                    @error('first_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control @error('last_name')border-danger @enderror" id="last_name" name="last_name" value="{{$account->last_name}}">
                    @error('last_name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            @if(Auth::user()->role->role_name == 'student')
            <div class="mb-5">
                <select id="college_id" name="college" class="form-select w-25" aria-label="Default select example">
                    <option value="{{$account->college_id}}">{{$account->college->college_name}}</option>
                    @foreach($colleges as $college)
                    <option value="{{ $college->id }}">{{ $college->college_name }}</option>
                    @endforeach
                </select>
                @error('college')
                <div class="text-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            @endif

        </div>
        <button onclick="return confirm('Are you sure you want to update {{$account->first_name}}?')" type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

@endsection
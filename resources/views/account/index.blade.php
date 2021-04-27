@extends('layouts.dashboard')

@section('wrap')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mg tabcontent">
    <div class="mb-4 fs-2 fw-bold">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</div>
    <p class="mb-5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua"</p>
    <div class="d-flex mb-5">
        <input type="search" name="search" class="form-control w-25 mx-5" placeholder="search">
        @if (Auth::user()->role->role_name == 'admin')
        <a href="{{route('documents.create')}}" class="btn btn-info">Add New Document</a>
        @endif
    </div>
    
 
</div>
@endsection
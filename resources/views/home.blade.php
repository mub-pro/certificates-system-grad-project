@extends('layouts.app')

@section('content')

<div class="container">

      <div class="row d-flex justify-content-center mt-5">
            <div class="col-5">
                  <div class="mt-5 mb-5 fs-1 fw-bold">Certificates System</div>

                  <p class="fs-5 mb-5 mt-5 fw-light">You Can Manage Your Documents by <span class="fw-bold text-info">Download</span> it or <span class="fw-bold text-info">Share</span> it</p>
                  @guest
                        <a href="{{ route('login') }}" class="btn bg-primary text-light px-5 py-2 mt-5 fw-bold">Login</a>

                        <div class="mb-5 mt-5 fw-light"><a href="{{ route('register.index') }}">Creare New Account</a></div>
                  @endguest

                  @auth

                  @if(Auth::user()->role->role_name == 'admin')
                         <a href="{{ route('users.index') }}" class="btn bg-primary text-light px-5 py-2 mt-5 fw-bold">Go to Dashboard</a>

                  @else
                        <a href="{{ route('documents.index') }}" class="btn bg-primary text-light px-5 py-2 mt-5 fw-bold">Go to Dashboard</a>
                  @endif
                       
                  @endauth


            </div>

            <div class="col-4">
                  <img src="/img/img.png" alt="student" width="100%">
            </div>

      </div>


</div>


@endsection
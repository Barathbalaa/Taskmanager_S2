@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="container">
        <div class="mt-4">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif
            @if(session()->has('error'))
                 <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            @if(session()->has('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <form action="{{ route('registration.post') }}" method="POST" class="ms-auto me-auto mt-4" style="width: 00px;">
            @csrf
            <h5>REGISTRATION</h5><hr>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail ID</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password" required>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

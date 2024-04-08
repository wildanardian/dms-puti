@extends('layouts.auth')

@section('content')
<div class="row">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="col-md-12 mb-3">
            <h2>Sign In</h2>
            <p>Enter your username and password to login</p>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="input_type" type="text" class="form-control" value="{{ old('input_type') }}">
                @error('username')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input name="password" type="password" class="form-control" >
                @error('password')
                    <small style="color: red">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <div class="form-check form-check-primary form-check-inline">
                    <input class="form-check-input me-3" type="checkbox" id="form-check-default" name="remember">
                    <label class="form-check-label" for="form-check-default">
                        Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-4">
                <button class="btn btn-secondary w-100">SIGN IN</button>
            </div>
        </div>
    </form>
</div>
@endsection
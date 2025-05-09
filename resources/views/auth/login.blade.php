@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white text-center" style="border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem; border-bottom: none;">
                    <span class="material-icons text-primary" style="font-size: 2.5rem;">login</span>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('login/post') }}" autocomplete="off">
                        @csrf
                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                            <label for="email">Email Address</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="border-radius: 0.75rem; font-weight: 600; letter-spacing: 1px;">

                                <span class="align-middle">Login</span>
                            </button>
                        </div>
                        <div class="mt-3 text-center">
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .form-floating > .form-control:focus ~ label,
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        opacity: 0.85;
        transform: scale(0.85) translateY(-1.5rem) translateX(0.15rem);
        color: #1976d2;
    }
    .form-floating > label {
        transition: all 0.2s;
        opacity: 0.6;
        pointer-events: none;
        left: 0.75rem;
        top: 0.75rem;
    }
</style>
@endpush
@endsection

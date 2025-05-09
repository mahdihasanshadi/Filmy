@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-user-edit"></i> Edit User</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to User Details
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold">
                                <i class="fas fa-user"></i> Name
                            </label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                value="{{ old('name', $user->name) }}"
                                required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">
                                <i class="fas fa-envelope"></i> Email
                            </label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">
                                <i class="fas fa-lock"></i> New Password
                            </label>
                            <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                id="password"
                                name="password"
                                placeholder="Leave blank to keep current password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Leave this field empty if you don't want to change the password.</small>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold">
                                <i class="fas fa-lock"></i> Confirm New Password
                            </label>
                            <input type="password"
                                class="form-control"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Confirm new password">
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input @error('is_verified') is-invalid @enderror"
                                    id="is_verified"
                                    name="is_verified"
                                    value="1"
                                    {{ old('is_verified', $user->is_verified) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_verified">
                                    <i class="fas fa-check-circle"></i> Verified User
                                </label>
                                @error('is_verified')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox"
                                    class="form-check-input @error('is_admin') is-invalid @enderror"
                                    id="is_admin"
                                    name="is_admin"
                                    value="1"
                                    {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_admin">
                                    <i class="fas fa-shield-alt"></i> Admin User
                                </label>
                                @error('is_admin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-user"></i> User Details</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Users
            </a>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit User
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <div class="avatar-circle-lg bg-primary text-white mx-auto mb-3">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                    <h3 class="card-title">{{ $user->name }}</h3>
                    <p class="text-muted">{{ $user->email }}</p>
                    <div class="d-flex justify-content-center gap-2 mb-3">
                        @if($user->is_verified)
                            <span class="badge bg-success">
                                <i class="fas fa-check-circle"></i> Verified
                            </span>
                        @else
                            <span class="badge bg-warning">
                                <i class="fas fa-clock"></i> Pending
                            </span>
                        @endif
                        @if($user->is_admin)
                            <span class="badge bg-danger">
                                <i class="fas fa-shield-alt"></i> Admin
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                <i class="fas fa-user"></i> User
                            </span>
                        @endif
                    </div>
                    <div class="d-grid gap-2">
                        <form action="{{ route('users.destroy', $user) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Account Information</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Referer ID:</div>
                        <div class="col-md-8">
                            <span class="badge bg-info">{{ $user->referer_id }}</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Email Verified:</div>
                        <div class="col-md-8">
                            @if($user->email_verified_at)
                                <span class="badge bg-success">
                                    <i class="fas fa-check-circle"></i> {{ $user->email_verified_at->format('M d, Y H:i:s') }}
                                </span>
                            @else
                                <span class="badge bg-warning">
                                    <i class="fas fa-times-circle"></i> Not Verified
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Account Created:</div>
                        <div class="col-md-8">
                            <i class="fas fa-calendar-alt"></i> {{ $user->created_at->format('M d, Y H:i:s') }}
                            <small class="text-muted">({{ $user->created_at->diffForHumans() }})</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Last Updated:</div>
                        <div class="col-md-8">
                            <i class="fas fa-clock"></i> {{ $user->updated_at->format('M d, Y H:i:s') }}
                            <small class="text-muted">({{ $user->updated_at->diffForHumans() }})</small>
                        </div>
                    </div>
                </div>
            </div>

            @if($user->friends->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-users"></i> Friends ({{ $user->friends->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($user->friends as $friend)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle bg-primary text-white me-2">
                                                {{ strtoupper(substr($friend->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $friend->name }}</h6>
                                                <small class="text-muted">{{ $friend->email }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            @if($user->favorites->count() > 0)
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-heart"></i> Favorites ({{ $user->favorites->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($user->favorites as $favorite)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            @if($favorite->favoritable_type === 'App\Models\Movie')
                                                <i class="fas fa-film"></i>
                                            @else
                                                <i class="fas fa-tv"></i>
                                            @endif
                                            {{ $favorite->favoritable->title }}
                                        </h6>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Added {{ $favorite->created_at->diffForHumans() }}
                                            </small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
.avatar-circle-lg {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: bold;
}
</style>
@endsection

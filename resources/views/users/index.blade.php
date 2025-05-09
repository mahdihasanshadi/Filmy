@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-users"></i> Users</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-user-plus"></i> Add New User
            </a>
        </div>
    </div>

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

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('users.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                        placeholder="Search by name, email, or referer ID..."
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                    @endif
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Referer ID</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Friendship</th>
                            <th>Joined</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            @php
                                $isFriend = auth()->user()->friends->contains($user);
                                $hasPendingRequest = auth()->user()->sentFriendRequests()
                                    ->where('receiver_id', $user->id)
                                    ->where('status', 'pending')
                                    ->exists();
                                $hasReceivedRequest = auth()->user()->receivedFriendRequests()
                                    ->where('sender_id', $user->id)
                                    ->where('status', 'pending')
                                    ->exists();
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary text-white me-2">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        {{ $user->name }}
                                    </div>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $user->referer_id }}</span>
                                </td>
                                <td>
                                    @if($user->is_verified)
                                        <span class="badge bg-success">
                                            <i class="fas fa-check-circle"></i> Verified
                                        </span>
                                    @else
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> Pending
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->is_admin)
                                        <span class="badge bg-danger">
                                            <i class="fas fa-shield-alt"></i> Admin
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-user"></i> User
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->id === auth()->id())
                                        <span class="badge bg-secondary">
                                            <i class="fas fa-user"></i> You
                                        </span>
                                    @elseif($isFriend)
                                        <span class="badge bg-success">
                                            <i class="fas fa-user-friends"></i> Friends
                                        </span>
                                    @elseif($hasPendingRequest)
                                        <span class="badge bg-warning">
                                            <i class="fas fa-clock"></i> Request Sent
                                        </span>
                                    @elseif($hasReceivedRequest)
                                        <div class="btn-group">
                                            <form action="{{ route('friends.accept', auth()->user()->receivedFriendRequests()->where('sender_id', $user->id)->first()) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-check"></i> Accept
                                                </button>
                                            </form>
                                            <form action="{{ route('friends.reject', auth()->user()->receivedFriendRequests()->where('sender_id', $user->id)->first()) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <form action="{{ route('friends.send', $user) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user-plus"></i> Add Friend
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <span title="{{ $user->created_at->format('M d, Y H:i:s') }}">
                                        {{ $user->created_at->diffForHumans() }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="btn btn-sm btn-info"
                                            title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if($user->id !== auth()->id())
                                            @if($isFriend)
                                                <form action="{{ route('friends.remove', $user) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Remove Friend" onclick="return confirm('Are you sure you want to remove this friend?')">
                                                        <i class="fas fa-user-minus"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="fas fa-users fa-2x mb-3"></i>
                                        <p>No users found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $users->links() }}
            </div>
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
</style>
@endsection

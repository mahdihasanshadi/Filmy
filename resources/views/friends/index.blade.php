@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Friends</h2>
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

    <!-- Pending Friend Requests -->
    @if($pendingRequests->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Pending Friend Requests</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($pendingRequests as $request)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $request->sender->name }}</h5>
                                    <p class="card-text text-muted">{{ $request->sender->email }}</p>
                                    <div class="btn-group">
                                        <form action="{{ route('friends.accept', $request) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-check"></i> Accept
                                            </button>
                                        </form>
                                        <form action="{{ route('friends.reject', $request) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Sent Friend Requests -->
    @if($sentRequests->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Sent Friend Requests</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($sentRequests as $request)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $request->receiver->name }}</h5>
                                    <p class="card-text text-muted">{{ $request->receiver->email }}</p>
                                    <form action="{{ route('friends.cancel', $request) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">
                                            <i class="fas fa-times"></i> Cancel Request
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Friends List -->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Friends List</h5>
        </div>
        <div class="card-body">
            @if($friends->count() > 0)
                <div class="row">
                    @foreach($friends as $friend)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $friend->name }}</h5>
                                    <p class="card-text text-muted">{{ $friend->email }}</p>
                                    <form action="{{ route('friends.remove', $friend) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this friend?')">
                                            <i class="fas fa-user-minus"></i> Remove Friend
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted mb-0">You don't have any friends yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection

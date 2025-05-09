@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Recommendations</h2>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4" id="recommendationTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="received-tab" data-bs-toggle="tab" data-bs-target="#received" type="button" role="tab">
                Received
                @if($receivedRecommendations->where('is_read', false)->count() > 0)
                    <span class="badge bg-danger">{{ $receivedRecommendations->where('is_read', false)->count() }}</span>
                @endif
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button" role="tab">
                Sent
            </button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="recommendationTabsContent">
        <!-- Received Recommendations -->
        <div class="tab-pane fade show active" id="received" role="tabpanel">
            @if($receivedRecommendations->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>No recommendations received yet.
                </div>
            @else
                <div class="row">
                    @foreach($receivedRecommendations as $recommendation)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 {{ !$recommendation->is_read ? 'border-primary' : '' }}">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-user me-2"></i>From: {{ $recommendation->sender->name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $recommendation->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if($recommendation->movie)
                                            <i class="fas fa-film me-2"></i>{{ $recommendation->movie->title }}
                                        @else
                                            <i class="fas fa-tv me-2"></i>{{ $recommendation->series->title }}
                                        @endif
                                    </h5>
                                    @if($recommendation->message)
                                        <p class="card-text">{{ $recommendation->message }}</p>
                                    @endif
                                    <div class="mt-3">
                                        @if($recommendation->movie)
                                            <a href="{{ route('movies.show', $recommendation->movie) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>View Movie
                                            </a>
                                        @else
                                            <a href="{{ route('series.show', $recommendation->series) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>View Series
                                            </a>
                                        @endif
                                        <form action="{{ route('recommendations.destroy', $recommendation) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $receivedRecommendations->links() }}
            @endif
        </div>

        <!-- Sent Recommendations -->
        <div class="tab-pane fade" id="sent" role="tabpanel">
            @if($sentRecommendations->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>You haven't sent any recommendations yet.
                </div>
            @else
                <div class="row">
                    @foreach($sentRecommendations as $recommendation)
                        <div class="col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-user me-2"></i>To: {{ $recommendation->receiver->name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ $recommendation->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        @if($recommendation->movie)
                                            <i class="fas fa-film me-2"></i>{{ $recommendation->movie->title }}
                                        @else
                                            <i class="fas fa-tv me-2"></i>{{ $recommendation->series->title }}
                                        @endif
                                    </h5>
                                    @if($recommendation->message)
                                        <p class="card-text">{{ $recommendation->message }}</p>
                                    @endif
                                    <div class="mt-3">
                                        @if($recommendation->movie)
                                            <a href="{{ route('movies.show', $recommendation->movie) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>View Movie
                                            </a>
                                        @else
                                            <a href="{{ route('series.show', $recommendation->series) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye me-1"></i>View Series
                                            </a>
                                        @endif
                                        <form action="{{ route('recommendations.destroy', $recommendation) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $sentRecommendations->links() }}
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mark recommendations as read when viewed
    const unreadRecommendations = document.querySelectorAll('.card.border-primary');
    unreadRecommendations.forEach(card => {
        const recommendationId = card.dataset.recommendationId;
        fetch(`/recommendations/${recommendationId}/read`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        });
    });
});
</script>
@endpush
@endsection

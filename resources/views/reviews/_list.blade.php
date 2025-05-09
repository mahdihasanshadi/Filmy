<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h3 class="card-title h5 mb-0">
            <i class="fas fa-comments me-2"></i>Reviews ({{ $reviews->count() }})
        </h3>
    </div>

    <div class="card-body">
        @if($reviews->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-comment-slash fa-2x text-muted mb-3"></i>
                <p class="text-muted mb-0">No reviews yet. Be the first to review!</p>
            </div>
        @else
            <div class="list-group list-group-flush">
                @foreach($reviews as $review)
                    <div class="list-group-item py-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    {{ strtoupper(substr($review->user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <h6 class="mb-1">{{ $review->user->name }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-clock me-1"></i>{{ $review->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>

                            @if(auth()->id() === $review->user_id || auth()->user()?->is_admin)
                                <div>
                                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-link text-danger p-0"
                                                onclick="return confirm('Are you sure you want to delete this review?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        @if($review->comment)
                            <div class="mt-3">
                                {{ $review->comment }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            @if($reviews->hasPages())
                <div class="mt-4">
                    {{ $reviews->links() }}
                </div>
            @endif
        @endif
    </div>
</div>

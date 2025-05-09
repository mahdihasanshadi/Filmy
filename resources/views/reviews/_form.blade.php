@auth
<div class="card shadow-sm mb-4">
    <div class="card-header bg-white">
        <h3 class="card-title h5 mb-0">
            <i class="fas fa-comment me-2"></i>Write a Review
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            @if(isset($movie))
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            @else
                <input type="hidden" name="series_id" value="{{ $series->id }}">
            @endif

            <div class="mb-3">
                <label for="comment" class="form-label">Your Review</label>
                <textarea
                    name="comment"
                    id="comment"
                    rows="4"
                    class="form-control @error('comment') is-invalid @enderror"
                    placeholder="Share your thoughts about this {{ isset($movie) ? 'movie' : 'series' }}..."
                >{{ $userReview->comment ?? old('comment') }}</textarea>
                @error('comment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i>
                    {{ isset($userReview) ? 'Update Review' : 'Submit Review' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endauth

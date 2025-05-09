@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Favorite Movies</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($favorites as $favorite)
            @php $movie = $favorite->favoritable; @endphp
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($movie->poster)
                        <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 400px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 400px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">
                            @if($movie->genres && $movie->genres->count() > 0)
                                @foreach($movie->genres as $genre)
                                    <span class="badge bg-primary">{{ $genre->name }}</span>
                                @endforeach
                            @endif
                        </p>
                        <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <form action="{{ route('favorites.toggle') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="type" value="movie">
                            <input type="hidden" name="id" value="{{ $movie->id }}">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-heart"></i> Remove from Favorites
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    You haven't added any movies to your favorites yet.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $favorites->links() }}
    </div>
</div>
@endsection

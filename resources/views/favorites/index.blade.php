@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-heart"></i> My Favorites</h2>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="favoritesTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="movies-tab" data-bs-toggle="tab" data-bs-target="#movies" type="button" role="tab">
                        <i class="fas fa-film"></i> Movies
                        <span class="badge bg-primary ms-2">{{ $movieFavorites->total() }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="series-tab" data-bs-toggle="tab" data-bs-target="#series" type="button" role="tab">
                        <i class="fas fa-tv"></i> TV Series
                        <span class="badge bg-primary ms-2">{{ $seriesFavorites->total() }}</span>
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="favoritesTabsContent">
                <!-- Movies Tab -->
                <div class="tab-pane fade show active" id="movies" role="tabpanel">
                    <div class="row">
                        @forelse($movieFavorites as $favorite)
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
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">
                                                <i class="fas fa-clock"></i> {{ $movie->duration }} min
                                            </span>
                                            <span class="text-muted">
                                                <i class="fas fa-calendar"></i> {{ $movie->release_year }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <form action="{{ route('favorites.toggle') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="movie">
                                                <input type="hidden" name="id" value="{{ $movie->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-heart"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> You haven't added any movies to your favorites yet.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $movieFavorites->links() }}
                    </div>
                </div>

                <!-- Series Tab -->
                <div class="tab-pane fade" id="series" role="tabpanel">
                    <div class="row">
                        @forelse($seriesFavorites as $favorite)
                            @php $series = $favorite->favoritable; @endphp
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    @if($series->poster)
                                        <img src="{{ $series->poster }}" class="card-img-top" alt="{{ $series->title }}" style="height: 400px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 400px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $series->title }}</h5>
                                        <p class="card-text">
                                            @if($series->genres && $series->genres->count() > 0)
                                                @foreach($series->genres as $genre)
                                                    <span class="badge bg-primary">{{ $genre->name }}</span>
                                                @endforeach
                                            @endif
                                        </p>
                                        <p class="card-text">{{ Str::limit($series->description, 100) }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted">
                                                <i class="fas fa-tv"></i> {{ $series->seasons_count }} Seasons
                                            </span>
                                            <span class="text-muted">
                                                <i class="fas fa-calendar"></i> {{ $series->release_year }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('series.show', $series) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <form action="{{ route('favorites.toggle') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="type" value="series">
                                                <input type="hidden" name="id" value="{{ $series->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-heart"></i> Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> You haven't added any TV series to your favorites yet.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $seriesFavorites->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

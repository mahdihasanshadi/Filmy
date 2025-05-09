@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h2>{{ $genre->name }}</h2>
            @if($genre->description)
                <p class="text-muted">{{ $genre->description }}</p>
            @endif
        </div>
    </div>

    <!-- Movies Section -->
    <div class="mb-5">
        <h3 class="mb-4">Movies</h3>
        @if($movies->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>No movies found in this genre.
            </div>
        @else
            <div class="row">
                @foreach($movies as $movie)
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
                                    @foreach($movie->genres as $movieGenre)
                                        <span class="badge bg-primary">{{ $movieGenre->name }}</span>
                                    @endforeach
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
                                <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $movies->links() }}
            </div>
        @endif
    </div>

    <!-- Series Section -->
    <div class="mb-5">
        <h3 class="mb-4">TV Series</h3>
        @if($series->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle me-2"></i>No TV series found in this genre.
            </div>
        @else
            <div class="row">
                @foreach($series as $show)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($show->poster)
                                <img src="{{ $show->poster }}" class="card-img-top" alt="{{ $show->title }}" style="height: 400px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 400px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $show->title }}</h5>
                                <p class="card-text">
                                    <span class="badge bg-primary">{{ $show->genre->name }}</span>
                                </p>
                                <p class="card-text">{{ Str::limit($show->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">
                                        <i class="fas fa-calendar"></i> {{ $show->release_year }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('series.show', $show) }}" class="btn btn-primary w-100">
                                    <i class="fas fa-eye me-1"></i> View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $series->links() }}
            </div>
        @endif
    </div>
</div>
@endsection

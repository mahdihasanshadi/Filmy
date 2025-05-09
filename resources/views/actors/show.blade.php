@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Actor Details</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('actors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Actors
            </a>
            <a href="{{ route('actors.edit', $actor) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Actor
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                @if($actor->photo)
                    <img src="{{ $actor->photo }}" class="card-img-top" alt="{{ $actor->name }}" style="height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 400px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $actor->name }}</h3>
                    <p class="card-text">
                        <strong>Gender:</strong> {{ ucfirst($actor->gender) }}<br>
                        <strong>Birth Date:</strong> {{ $actor->birth_date ? $actor->birth_date->format('F j, Y') : 'N/A' }}<br>
                        <strong>Birth Place:</strong> {{ $actor->birth_place ?? 'N/A' }}<br>
                        <strong>Status:</strong>
                        <span class="badge {{ $actor->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $actor->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="card-title">Biography</h4>
                    <p class="card-text">{{ $actor->biography }}</p>
                </div>
            </div>

            <!-- Movies Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0">Movies</h4>
                </div>
                <div class="card-body">
                    @if($actor->movies->count() > 0)
                        <div class="row">
                            @foreach($actor->movies as $movie)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($movie->poster_url)
                                            <img src="{{ $movie->poster_url }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $movie->title }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i> {{ $movie->release_year }}
                                                </small>
                                            </p>
                                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> View Movie
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No movies found.</p>
                    @endif
                </div>
            </div>

            <!-- Series Section -->
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Series</h4>
                </div>
                <div class="card-body">
                    @if($actor->series->count() > 0)
                        <div class="row">
                            @foreach($actor->series as $series)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($series->poster_url)
                                            <img src="{{ $series->poster_url }}" class="card-img-top" alt="{{ $series->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $series->title }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i> {{ $series->release_year }}
                                                </small>
                                            </p>
                                            <a href="{{ route('series.show', $series) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> View Series
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No series found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
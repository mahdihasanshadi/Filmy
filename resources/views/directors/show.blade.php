@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Director Details</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('directors.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Directors
            </a>
            <a href="{{ route('directors.edit', $director) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Director
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                @if($director->photo)
                    <img src="{{ $director->photo }}" class="card-img-top" alt="{{ $director->name }}" style="height: 400px; object-fit: cover;">
                @else
                    <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 400px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h3 class="card-title">{{ $director->name }}</h3>
                    <p class="card-text">
                        <strong><i class="fas fa-venus-mars"></i> Gender:</strong> {{ ucfirst($director->gender) }}<br>
                        <strong><i class="fas fa-calendar"></i> Birth Date:</strong> {{ $director->birth_date ? $director->birth_date->format('F j, Y') : 'N/A' }}<br>
                        <strong><i class="fas fa-map-marker-alt"></i> Birth Place:</strong> {{ $director->birth_place ?? 'N/A' }}<br>
                        <strong><i class="fas fa-circle"></i> Status:</strong>
                        <span class="badge {{ $director->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $director->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0"><i class="fas fa-book"></i> Biography</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $director->biography }}</p>
                </div>
            </div>

            <!-- Movies Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0"><i class="fas fa-film"></i> Directed Movies</h4>
                </div>
                <div class="card-body">
                    @if($director->movies->count() > 0)
                        <div class="row">
                            @foreach($director->movies as $movie)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($movie->poster)
                                            <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $movie->title }}</h6>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i> {{ $movie->release_year }}<br>
                                                    <i class="fas fa-clock"></i> {{ $movie->duration }} minutes
                                                </small>
                                            </p>
                                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-info-circle"></i> View Movie
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No movies directed yet.</p>
                    @endif
                </div>
            </div>

            <!-- Series Section -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="mb-0"><i class="fas fa-tv"></i> Directed Series</h4>
                </div>
                <div class="card-body">
                    @if($director->series->count() > 0)
                        <div class="row">
                            @foreach($director->series as $series)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($series->poster)
                                            <img src="{{ $series->poster }}" class="card-img-top" alt="{{ $series->title }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $series->title }}</h6>
                                            <p class="card-text">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i> {{ $series->release_year }}<br>
                                                    <i class="fas fa-film"></i> {{ $series->seasons->count() }} Seasons
                                                </small>
                                            </p>
                                            <a href="{{ route('series.show', $series) }}" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-info-circle"></i> View Series
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No series directed yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

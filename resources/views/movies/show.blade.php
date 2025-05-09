@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Movies
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                @if($movie->poster)
                    <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}" style="width: 100%; height: auto;">
                @else
                    <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="width: 100%; height: auto;">
                @endif
                @if($movie->trailer_url)
                    <div class="card-body">
                        <a href="{{ $movie->trailer_url }}" target="_blank" class="btn btn-primary w-100">
                            <i class="fas fa-play"></i> Watch Trailer
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h2 class="mb-0">{{ $movie->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h5>Description</h5>
                        <p>{{ $movie->description }}</p>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <p><strong><i class="fas fa-clock"></i> Duration:</strong> {{ $movie->duration }} minutes</p>
                            <p><strong><i class="fas fa-calendar"></i> Release Year:</strong> {{ $movie->release_year }}</p>
                            <p>
                                <strong><i class="fas fa-film"></i> Genre:</strong>
                                @if($movie->genres && $movie->genres->count() > 0)
                                    @foreach($movie->genres as $genre)
                                        <span class="badge bg-primary">{{ $genre->name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No genre specified</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5><i class="fas fa-users"></i> Cast</h5>
                        <div class="row">
                            @forelse($movie->actors as $actor)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($actor->photo)
                                            <img src="{{ $actor->photo }}" class="card-img-top" alt="{{ $actor->name }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $actor->name }}</h6>
                                            <a href="{{ route('actors.show', $actor) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-info-circle"></i> View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted">No actors listed</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5><i class="fas fa-film"></i> Directors</h5>
                        <div class="row">
                            @forelse($movie->directors as $director)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        @if($director->photo)
                                            <img src="{{ $director->photo }}" class="card-img-top" alt="{{ $director->name }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 200px; object-fit: cover;">
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">{{ $director->name }}</h6>
                                            <a href="{{ route('directors.show', $director) }}" class="btn btn-sm btn-outline-success">
                                                <i class="fas fa-info-circle"></i> View Profile
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted">No directors listed</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this movie?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reviews section -->
    <div class="mt-8">
        @include('reviews._form')
        @include('reviews._list')
    </div>
</div>
@endsection

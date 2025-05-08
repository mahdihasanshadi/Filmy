@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                @if($movie->poster)
                    <img src="{{ $movie->poster }}" class="card-img-top" alt="{{ $movie->title }}" style="width: 100%; height: auto;">
                @else
                    <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="width: 100%; height: auto;">
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">{{ $movie->title }}</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $movie->description }}</p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Duration:</strong> {{ $movie->duration }} minutes</p>
                            <p><strong>Release Year:</strong> {{ $movie->release_year }}</p>
                            <p><strong>Genre:</strong> <span class="badge bg-primary">{{ $movie->genre->name }}</span></p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5>Actors</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($movie->actors as $actor)
                                <span class="badge bg-primary">{{ $actor->name }}</span>
                            @empty
                                <p>No actors listed</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-3">
                        <h5>Directors</h5>
                        <div class="d-flex flex-wrap gap-2">
                            @forelse($movie->directors as $director)
                                <span class="badge bg-success">{{ $director->name }}</span>
                            @empty
                                <p>No directors listed</p>
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
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
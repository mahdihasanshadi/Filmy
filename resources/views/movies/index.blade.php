@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Movies</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('movies.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Movie
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('movies.index') }}" method="GET" class="row g-3">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"
                            placeholder="Search by title, description, genre, actor, or director"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    @if(request('search'))
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear Search
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($movies as $movie)
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
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                        <form action="{{ route('favorites.toggle') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="type" value="movie">
                            <input type="hidden" name="id" value="{{ $movie->id }}">
                            <button type="submit" class="btn {{ auth()->user()->favorites()->where('favoritable_type', 'App\\Models\\Movie')->where('favoritable_id', $movie->id)->exists() ? 'btn-danger' : 'btn-outline-danger' }} btn-sm">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No movies found.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $movies->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2><i class="fas fa-film"></i> Directors</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('directors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Director
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('directors.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search directors by name, biography, or birth place..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('directors.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                    @endif
                </div>
            </form>

            <div class="row">
                @forelse($directors as $director)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($director->photo)
                                <img src="{{ $director->photo }}" class="card-img-top" alt="{{ $director->name }}" style="height: 300px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 300px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $director->name }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-venus-mars"></i> {{ ucfirst($director->gender) }}<br>
                                        <i class="fas fa-calendar"></i> {{ $director->birth_date ? $director->birth_date->format('F j, Y') : 'N/A' }}<br>
                                        <i class="fas fa-map-marker-alt"></i> {{ $director->birth_place ?? 'N/A' }}
                                    </small>
                                </p>
                                <p class="card-text">{{ Str::limit($director->biography, 100) }}</p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('directors.show', $director) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('directors.edit', $director) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('directors.destroy', $director) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this director?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">
                                    <i class="fas fa-film"></i> {{ $director->movies->count() }} Movies
                                    <i class="fas fa-tv ms-2"></i> {{ $director->series->count() }} Series
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> No directors found.
                        </div>
                    </div>
                @endforelse
            </div>
            <nav aria-label="Genres pagination" class="d-flex justify-content-center mt-4">
                {{ $directors->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>
</div>
@endsection

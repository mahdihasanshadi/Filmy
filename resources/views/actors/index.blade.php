@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Actors</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('actors.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Actor
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('actors.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search actors..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('actors.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Clear
                        </a>
                    @endif
                </div>
            </form>

            <div class="row">
                @forelse($actors as $actor)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if($actor->photo)
                                <img src="{{ $actor->photo }}" class="card-img-top" alt="{{ $actor->name }}" style="height: 300px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-photo.jpg') }}" class="card-img-top" alt="No Photo" style="height: 300px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $actor->name }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-calendar"></i> {{ $actor->birth_date ? $actor->birth_date->format('F j, Y') : 'N/A' }}<br>
                                        <i class="fas fa-map-marker-alt"></i> {{ $actor->birth_place ?? 'N/A' }}
                                    </small>
                                </p>
                                <p class="card-text">{{ Str::limit($actor->biography, 100) }}</p>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('actors.show', $actor) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('actors.edit', $actor) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('actors.destroy', $actor) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this actor?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">No actors found.</p>
                    </div>
                @endforelse
            </div>

            <nav aria-label="Actors pagination" class="d-flex justify-content-center mt-4">
                {{ $actors->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>
</div>
@endsection

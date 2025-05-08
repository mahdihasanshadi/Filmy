@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit Movie
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('movies.update', $movie) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold">Title</label>
                                    <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $movie->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label fw-bold">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="4">{{ old('description', $movie->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="poster" class="form-label fw-bold">Poster URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        <input type="url" class="form-control @error('poster') is-invalid @enderror"
                                            id="poster" name="poster" value="{{ old('poster', $movie->poster) }}"
                                            placeholder="https://example.com/poster.jpg">
                                    </div>
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Enter a direct URL to the movie poster image
                                    </div>
                                    @if($movie->poster)
                                        <div class="mt-2">
                                            <img src="{{ $movie->poster }}" alt="Current poster" class="img-thumbnail w-100" style="max-height: 300px; object-fit: cover;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="trailer_url" class="form-label fw-bold">Trailer URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-video"></i></span>
                                        <input type="url" class="form-control @error('trailer_url') is-invalid @enderror"
                                            id="trailer_url" name="trailer_url" value="{{ old('trailer_url', $movie->trailer_url) }}">
                                    </div>
                                    @error('trailer_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="duration" class="form-label fw-bold">Duration (minutes)</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        <input type="number" class="form-control @error('duration') is-invalid @enderror"
                                            id="duration" name="duration" value="{{ old('duration', $movie->duration) }}">
                                    </div>
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-4">
                                    <label for="release_year" class="form-label fw-bold">Release Year</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        <input type="number" class="form-control @error('release_year') is-invalid @enderror"
                                            id="release_year" name="release_year" value="{{ old('release_year', $movie->release_year) }}">
                                    </div>
                                    @error('release_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="genre_id" class="form-label fw-bold">Genre</label>
                                    <select class="form-select @error('genre_id') is-invalid @enderror"
                                        id="genre_id" name="genre_id" required>
                                        <option value="">Select Genre</option>
                                        @foreach($genres as $genre)
                                            <option value="{{ $genre->id }}"
                                                {{ old('genre_id', $movie->genre_id) == $genre->id ? 'selected' : '' }}>
                                                {{ $genre->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('genre_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="directors" class="form-label fw-bold">Directors</label>
                                    <select class="form-select @error('directors') is-invalid @enderror"
                                        id="directors" name="directors[]" multiple size="5">
                                        @foreach($directors as $director)
                                            <option value="{{ $director->id }}"
                                                {{ in_array($director->id, old('directors', $movie->directors->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $director->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Hold Ctrl/Cmd to select multiple directors
                                    </div>
                                    @error('directors')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="actors" class="form-label fw-bold">Actors</label>
                                    <select class="form-select" id="actors" name="actors[]" multiple size="5">
                                        @foreach($actors as $actor)
                                            <option value="{{ $actor->id }}"
                                                {{ in_array($actor->id, old('actors', $movie->actors->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                {{ $actor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Hold Ctrl/Cmd to select multiple actors
                                    </div>
                                    @error('actors')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                    value="1" {{ old('is_active', $movie->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label fw-bold" for="is_active">Active</label>
                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Update Movie
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
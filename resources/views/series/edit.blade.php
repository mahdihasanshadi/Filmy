@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">
                        <i class="fas fa-edit me-2"></i>Edit TV Series
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('series.update', $series) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label fw-bold">Title</label>
                                    <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $series->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label fw-bold">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description" rows="4">{{ old('description', $series->description) }}</textarea>
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
                                            id="poster" name="poster" value="{{ old('poster', $series->poster) }}"
                                            placeholder="https://example.com/poster.jpg">
                                    </div>
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Enter a direct URL to the series poster image
                                    </div>
                                    @if($series->poster)
                                        <div class="mt-2">
                                            <img src="{{ $series->poster }}" alt="Current Poster" class="img-thumbnail" style="max-height: 200px;">
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
                                            id="trailer_url" name="trailer_url" value="{{ old('trailer_url', $series->trailer_url) }}">
                                    </div>
                                    @error('trailer_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label for="release_year" class="form-label fw-bold">Release Year</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        <input type="number" class="form-control @error('release_year') is-invalid @enderror"
                                            id="release_year" name="release_year" value="{{ old('release_year', $series->release_year) }}"
                                            min="1900" max="{{ date('Y') + 1 }}">
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
                                                {{ old('genre_id', $series->genre_id) == $genre->id ? 'selected' : '' }}>
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
                                                {{ in_array($director->id, old('directors', $series->directors->pluck('id')->toArray())) ? 'selected' : '' }}>
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
                                    <select class="form-select @error('actors') is-invalid @enderror"
                                        id="actors" name="actors[]" multiple size="5">
                                        @foreach($actors as $actor)
                                            <option value="{{ $actor->id }}"
                                                {{ in_array($actor->id, old('actors', $series->actors->pluck('id')->toArray())) ? 'selected' : '' }}>
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

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('series.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Update Series
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

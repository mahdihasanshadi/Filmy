@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="row">
        <div class="col-md-4">
            @if($series->poster)
                <img src="{{ $series->poster }}" alt="{{ $series->title }}" class="img-fluid rounded shadow">
            @else
                <img src="{{ asset('images/no-poster.jpg') }}" alt="No Poster" class="img-fluid rounded shadow">
            @endif
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="card-title mb-3">{{ $series->title }}</h1>

                    <div class="mb-3">
                        @if($series->genre)
                            <span class="badge bg-primary me-2">{{ $series->genre->name }}</span>
                        @endif
                        @if($series->release_year)
                            <span class="badge bg-secondary">{{ $series->release_year }}</span>
                        @endif
                    </div>

                    <p class="card-text">{{ $series->description }}</p>

                    @if($series->trailer_url)
                        <div class="mb-4">
                            <h5>Trailer</h5>
                            <div class="ratio ratio-16x9">
                                <iframe src="{{ $series->trailer_url }}" allowfullscreen></iframe>
                            </div>
                        </div>
                    @endif

                    @if($series->directors->count() > 0)
                        <div class="mb-3">
                            <h5>Directors</h5>
                            <ul class="list-unstyled">
                                @foreach($series->directors as $director)
                                    <li>{{ $director->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($series->actors->count() > 0)
                        <div class="mb-3">
                            <h5>Cast</h5>
                            <ul class="list-unstyled">
                                @foreach($series->actors as $actor)
                                    <li>{{ $actor->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="d-flex gap-2">
                        <a href="{{ route('series.edit', $series) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('series.destroy', $series) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($series->seasons->count() > 0)
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Seasons</h4>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="seasonsAccordion">
                            @foreach($series->seasons as $season)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $season->id }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $season->id }}">
                                            {{ $season->title }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $season->id }}" class="accordion-collapse collapse" data-bs-parent="#seasonsAccordion">
                                        <div class="accordion-body">
                                            <p>{{ $season->description }}</p>

                                            @if($season->episodes->count() > 0)
                                                <h5>Episodes</h5>
                                                <div class="list-group">
                                                    @foreach($season->episodes as $episode)
                                                        <div class="list-group-item">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <h6 class="mb-1">Episode {{ $episode->episode_number }}: {{ $episode->title }}</h6>
                                                                    <p class="mb-1">{{ $episode->description }}</p>
                                                                    <small class="text-muted">Duration: {{ $episode->duration }} minutes</small>
                                                                </div>
                                                                @if($episode->video_url)
                                                                    <a href="{{ $episode->video_url }}" class="btn btn-primary btn-sm" target="_blank">
                                                                        <i class="fas fa-play me-1"></i>Watch
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p class="text-muted">No episodes available for this season.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Reviews section -->
    <div class="mt-8">
        @include('reviews._form')
        @include('reviews._list')
    </div>
</div>
@endsection

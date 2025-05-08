@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>TV Series</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('series.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Series
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse($series as $show)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($show->poster)
                        <img src="{{ $show->poster }}" class="card-img-top" alt="{{ $show->title }}" style="height: 400px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/no-poster.jpg') }}" class="card-img-top" alt="No Poster" style="height: 400px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $show->title }}</h5>
                        <p class="card-text">
                            @if($show->genre)
                                <span class="badge bg-primary">{{ $show->genre->name }}</span>
                            @endif
                        </p>
                        <p class="card-text">{{ Str::limit($show->description, 100) }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('series.show', $show) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('series.edit', $show) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('series.destroy', $show) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No TV series found.
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $series->links() }}
    </div>
</div>
@endsection

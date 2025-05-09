@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Genres</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('genres.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Genre
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Movies Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                            <tr>
                                <td>
                                    <a href="{{ route('genres.show', $genre) }}" class="text-decoration-none">
                                        {{ $genre->name }}
                                    </a>
                                </td>
                                <td>{{ $genre->slug }}</td>
                                <td>{{ $genre->movies->count() }}</td>
                                <td>
                                    <a href="{{ route('genres.edit', $genre) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('genres.destroy', $genre) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this genre?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No genres found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <nav aria-label="Genres pagination" class="d-flex justify-content-center mt-4">
                {{ $genres->links('pagination::bootstrap-5') }}
            </nav>
        </div>
    </div>
</div>
@endsection

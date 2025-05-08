<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCategory;
use App\Models\MovieGenre;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with(['genre', 'actors', 'directors'])
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = MovieGenre::where('is_active', true)->get();
        $actors = Actor::where('is_active', true)->get();
        $directors = Director::where('is_active', true)->get();

        return view('movies.create', compact('genres', 'actors', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster' => 'nullable|url|max:255',
            'trailer_url' => 'nullable|url',
            'duration' => 'nullable|integer',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'genre_id' => 'required|exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
        ]);

        $validated['is_active'] = true;

        $movie = Movie::create($validated);

        // Sync relationships
        if ($request->has('actors')) {
            $movie->actors()->sync($request->actors);
        }

        if ($request->has('directors')) {
            $movie->directors()->sync($request->directors);
        }

        return redirect()->route('movies.show', $movie)
            ->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movie->load(['genre', 'actors', 'directors', 'reviews']);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = MovieGenre::where('is_active', true)->get();
        $actors = Actor::where('is_active', true)->get();
        $directors = Director::where('is_active', true)->get();

        return view('movies.edit', compact('movie', 'genres', 'actors', 'directors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster' => 'nullable|url|max:255',
            'trailer_url' => 'nullable|url',
            'duration' => 'nullable|integer',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'genre_id' => 'required|exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
            'is_active' => 'boolean'
        ]);

        $movie->update($validated);

        // Sync relationships
        if ($request->has('actors')) {
            $movie->actors()->sync($request->actors);
        }

        if ($request->has('directors')) {
            $movie->directors()->sync($request->directors);
        }

        return redirect()->route('movies.show', $movie)
            ->with('success', 'Movie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        // Soft delete by updating is_active
        $movie->update(['is_active' => false]);

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully.');
    }
}

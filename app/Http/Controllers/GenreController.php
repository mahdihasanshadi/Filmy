<?php

namespace App\Http\Controllers;

use App\Models\MovieGenre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = MovieGenre::where('is_active', true)
                           ->orderBy('name')
                           ->paginate(10);

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genres.create');
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
            'name' => 'required|string|max:255|unique:movie_genres,name',
            'is_active' => 'boolean'
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = true;

        MovieGenre::create($validated);

        return redirect()->route('genres.index')
                        ->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MovieGenre $genre)
    {
        $movies = $genre->movies()
            ->where('is_active', true)
            ->with(['genres', 'actors', 'directors'])
            ->latest()
            ->paginate(10);

        $series = $genre->series()
            ->where('is_active', true)
            ->with(['genre', 'actors', 'directors'])
            ->latest()
            ->paginate(10);

        return view('genres.show', compact('genre', 'movies', 'series'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieGenre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieGenre $genre)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:movie_genres,name,' . $genre->id,
            'is_active' => 'boolean'
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);

        $genre->update($validated);

        return redirect()->route('genres.index')
                        ->with('success', 'Genre updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieGenre $genre)
    {
        // Check if genre is being used by any movies
        if ($genre->movies()->exists()) {
            return redirect()->route('genres.index')
                           ->with('error', 'Cannot delete genre that is being used by movies.');
        }

        // Soft delete by updating is_active
        $genre->update(['is_active' => false]);

        return redirect()->route('genres.index')
                        ->with('success', 'Genre deleted successfully.');
    }
}

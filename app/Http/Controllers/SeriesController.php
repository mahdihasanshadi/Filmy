<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\MovieCategory;
use App\Models\MovieGenre;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Series::with(['genre', 'actors', 'directors'])
            ->where('is_active', true);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('release_year', 'like', "%{$search}%")
                  ->orWhereHas('genre', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('actors', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  })
                  ->orWhereHas('directors', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $series = $query->latest()->paginate(10);

        return view('series.index', compact('series'));
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

        return view('series.create', compact('genres', 'actors', 'directors'));
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
            'trailer_url' => 'nullable|url|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'genre_id' => 'required|exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
            'is_active' => 'boolean'
        ]);

        // Get the TV Series category
        $tvSeriesCategory = MovieCategory::where('name', 'TV Series')->first();
        $validated['category_id'] = $tvSeriesCategory->id;
        $validated['is_active'] = true;

        $series = Series::create($validated);

        // Sync relationships
        if (isset($validated['actors'])) {
            $series->actors()->sync($validated['actors']);
        }
        if (isset($validated['directors'])) {
            $series->directors()->sync($validated['directors']);
        }

        return redirect()->route('series.index')
            ->with('success', 'Series created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function show(Series $series)
    {
        $series->load(['genre', 'actors', 'directors', 'seasons.episodes']);

        $reviews = $series->reviews()
            ->with('user')
            ->latest()
            ->paginate(10);

        $userReview = auth()->check()
            ? $series->reviews()->where('user_id', auth()->id())->first()
            : null;

        return view('series.show', compact('series', 'reviews', 'userReview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function edit(Series $series)
    {
        $genres = MovieGenre::where('is_active', true)->get();
        $actors = Actor::where('is_active', true)->get();
        $directors = Director::where('is_active', true)->get();

        return view('series.edit', compact('series', 'genres', 'actors', 'directors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Series $series)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster' => 'nullable|url|max:255',
            'trailer_url' => 'nullable|url|max:255',
            'release_year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'genre_id' => 'required|exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
            'is_active' => 'boolean'
        ]);

        $series->update($validated);

        // Sync relationships
        if (isset($validated['actors'])) {
            $series->actors()->sync($validated['actors']);
        }
        if (isset($validated['directors'])) {
            $series->directors()->sync($validated['directors']);
        }

        return redirect()->route('series.index')
            ->with('success', 'Series updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Series  $series
     * @return \Illuminate\Http\Response
     */
    public function destroy(Series $series)
    {
        $series->update(['is_active' => false]);
        return redirect()->route('series.index')
            ->with('success', 'Series deleted successfully.');
    }
}

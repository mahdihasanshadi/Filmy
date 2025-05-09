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
    public function index(Request $request)
    {
        $query = Movie::with(['genres', 'actors', 'directors'])
            ->where('is_active', true);

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('genres', function($q) use ($search) {
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

        $movies = $query->latest()->paginate(10);
        return view('movies.index', compact('movies'));
    }

    // $search = $request->get('search');
    // $sql = "SELECT movies.* FROM movies WHERE movies.is_active = 1";
    // $params = [];

    // if ($search) {
    //     $sql .= " AND (movies.title LIKE ? OR movies.description LIKE ? ";
    //     $params[] = "%{$search}%";
    //     $params[] = "%{$search}%";
    //     $sql .= " OR EXISTS (SELECT 1 FROM movie_movie_genre INNER JOIN movie_genres ON movie_movie_genre.movie_genre_id = movie_genres.id WHERE movie_movie_genre.movie_id = movies.id AND movie_genres.name LIKE ?)";
    //     $params[] = "%{$search}%";
    //     $sql .= " OR EXISTS (SELECT 1 FROM actor_movie INNER JOIN actors ON actor_movie.actor_id = actors.id WHERE actor_movie.movie_id = movies.id AND actors.name LIKE ?)";
    //     $params[] = "%{$search}%";
    //     $sql .= " OR EXISTS (SELECT 1 FROM director_movie INNER JOIN directors ON director_movie.director_id = directors.id WHERE director_movie.movie_id = movies.id AND directors.name LIKE ?))";
    //     $params[] = "%{$search}%";
    // }

    // $sql .= " ORDER BY movies.created_at DESC";

    // // Pagination
    // $page = $request->get('page', 1);
    // $perPage = 10;
    // $offset = ($page - 1) * $perPage;
    // $sqlPaginated = $sql . " LIMIT $perPage OFFSET $offset";

    // $movies = collect(DB::select($sqlPaginated, $params));

    // // Get total count for pagination
    // $countSql = "SELECT COUNT(*) as total FROM movies WHERE movies.is_active = 1";
    // $countParams = [];
    // if ($search) {
    //     $countSql .= " AND (movies.title LIKE ? OR movies.description LIKE ? ";
    //     $countParams[] = "%{$search}%";
    //     $countParams[] = "%{$search}%";
    //     $countSql .= " OR EXISTS (SELECT 1 FROM movie_movie_genre INNER JOIN movie_genres ON movie_movie_genre.movie_genre_id = movie_genres.id WHERE movie_movie_genre.movie_id = movies.id AND movie_genres.name LIKE ?)";
    //     $countParams[] = "%{$search}%";
    //     $countSql .= " OR EXISTS (SELECT 1 FROM actor_movie INNER JOIN actors ON actor_movie.actor_id = actors.id WHERE actor_movie.movie_id = movies.id AND actors.name LIKE ?)";
    //     $countParams[] = "%{$search}%";
    //     $countSql .= " OR EXISTS (SELECT 1 FROM director_movie INNER JOIN directors ON director_movie.director_id = directors.id WHERE director_movie.movie_id = movies.id AND directors.name LIKE ?))";
    //     $countParams[] = "%{$search}%";
    // }
    // $total = DB::select($countSql, $countParams)[0]->total;

    // $movies = new LengthAwarePaginator($movies, $total, $perPage, $page, [
    //     'path' => $request->url(),
    //     'query' => $request->query(),
    // ]);

    // return $movies;

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
            'genres' => 'required|array',
            'genres.*' => 'exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
        ]);

        $validated['is_active'] = true;

        $movie = Movie::create($validated);

        // Sync relationships
        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        }

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
        $movie->load(['genres', 'actors', 'directors']);

        $reviews = $movie->reviews()
            ->with('user')
            ->latest()
            ->paginate(10);

        $userReview = auth()->check()
            ? $movie->reviews()->where('user_id', auth()->id())->first()
            : null;

        return view('movies.show', compact('movie', 'reviews', 'userReview'));
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
            'genres' => 'required|array',
            'genres.*' => 'exists:movie_genres,id',
            'actors' => 'nullable|array',
            'actors.*' => 'exists:actors,id',
            'directors' => 'nullable|array',
            'directors.*' => 'exists:directors,id',
            'is_active' => 'boolean'
        ]);

        $movie->update($validated);

        // Sync relationships
        if ($request->has('genres')) {
            $movie->genres()->sync($request->genres);
        }

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

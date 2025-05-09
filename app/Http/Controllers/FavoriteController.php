<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $movieFavorites = auth()->user()->favorites()
            ->where('favoritable_type', Movie::class)
            ->with('favoritable')
            ->latest()
            ->paginate(9);

        $seriesFavorites = auth()->user()->favorites()
            ->where('favoritable_type', Series::class)
            ->with('favoritable')
            ->latest()
            ->paginate(9);

        return view('favorites.index', compact('movieFavorites', 'seriesFavorites'));
    }

    public function movies()
    {
        $favorites = auth()->user()->favorites()
            ->where('favoritable_type', Movie::class)
            ->with('favoritable')
            ->latest()
            ->paginate(10);

        return view('favorites.movies', compact('favorites'));
    }

    public function series()
    {
        $favorites = auth()->user()->favorites()
            ->where('favoritable_type', Series::class)
            ->with('favoritable')
            ->latest()
            ->paginate(10);

        return view('favorites.series', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'type' => 'required|in:movie,series',
            'id' => 'required|integer'
        ]);

        $model = $request->type === 'movie' ? Movie::class : Series::class;
        $item = $model::findOrFail($request->id);

        $favorite = auth()->user()->favorites()
            ->where('favoritable_type', $model)
            ->where('favoritable_id', $request->id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            $message = 'Removed from favorites';
        } else {
            auth()->user()->favorites()->create([
                'favoritable_type' => $model,
                'favoritable_id' => $request->id
            ]);
            $message = 'Added to favorites';
        }

        return back()->with('success', $message);
    }
}

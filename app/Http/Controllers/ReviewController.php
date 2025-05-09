<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
            'movie_id' => 'required_without:series_id|exists:movies,id',
            'series_id' => 'required_without:movie_id|exists:series,id',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['is_active'] = true;
        $validated['rating'] = 0; // Set a default value since the column exists

        // Check if user already reviewed this movie/series
        $existingReview = Review::where('user_id', auth()->id())
            ->where(function ($query) use ($validated) {
                $query->where('movie_id', $validated['movie_id'] ?? null)
                    ->orWhere('series_id', $validated['series_id'] ?? null);
            })
            ->first();

        if ($existingReview) {
            $existingReview->update($validated);
            $message = 'Review updated successfully.';
        } else {
            Review::create($validated);
            $message = 'Review added successfully.';
        }

        if (isset($validated['movie_id'])) {
            return redirect()->route('movies.show', $validated['movie_id'])
                ->with('success', $message);
        } else {
            return redirect()->route('series.show', $validated['series_id'])
                ->with('success', $message);
        }
    }

    public function destroy(Review $review)
    {
        if ($review->user_id !== auth()->id() && !auth()->user()->is_admin) {
            return back()->with('error', 'You are not authorized to delete this review.');
        }

        $movieId = $review->movie_id;
        $seriesId = $review->series_id;

        $review->delete();

        if ($movieId) {
            return redirect()->route('movies.show', $movieId)
                ->with('success', 'Review deleted successfully.');
        } else {
            return redirect()->route('series.show', $seriesId)
                ->with('success', 'Review deleted successfully.');
        }
    }
}

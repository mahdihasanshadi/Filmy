<?php

namespace App\Http\Controllers;

use App\Models\Recommendation;
use App\Models\User;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function index()
    {
        $receivedRecommendations = Recommendation::with(['sender', 'movie', 'series'])
            ->where('receiver_id', auth()->id())
            ->latest()
            ->paginate(10);

        $sentRecommendations = Recommendation::with(['receiver', 'movie', 'series'])
            ->where('sender_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('recommendations.index', compact('receivedRecommendations', 'sentRecommendations'));
    }

    public function create(Request $request)
    {
        $friends = auth()->user()->friends;
        $type = $request->type;
        $id = $request->id;

        if ($type === 'movie') {
            $item = Movie::findOrFail($id);
        } else {
            $item = Series::findOrFail($id);
        }

        return view('recommendations.create', compact('friends', 'type', 'item'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'nullable|string|max:500',
            'movie_id' => 'required_without:series_id|exists:movies,id',
            'series_id' => 'required_without:movie_id|exists:series,id',
        ]);

        $validated['sender_id'] = auth()->id();

        try {
            Recommendation::create($validated);
            return redirect()->back()->with('success', 'Recommendation sent successfully!');
        } catch (\Exception $e) {
            // Handle unique constraint violation
            if ($e->getCode() == 23000) {
                return redirect()->back()->with('error', 'You have already recommended this to this friend.');
            }
            throw $e;
        }
    }

    public function markAsRead(Recommendation $recommendation)
    {
        if ($recommendation->receiver_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $recommendation->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function destroy(Recommendation $recommendation)
    {
        if ($recommendation->sender_id !== auth()->id() && $recommendation->receiver_id !== auth()->id()) {
            return back()->with('error', 'You are not authorized to delete this recommendation.');
        }

        $recommendation->delete();
        return back()->with('success', 'Recommendation deleted successfully.');
    }
}

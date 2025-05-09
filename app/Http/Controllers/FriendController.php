<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\FriendRequest;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        $friends = auth()->user()->friends;
        $pendingRequests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();
        $sentRequests = FriendRequest::where('sender_id', auth()->id())
            ->where('status', 'pending')
            ->with('receiver')
            ->get();

        return view('friends.index', compact('friends', 'pendingRequests', 'sentRequests'));
    }

    public function sendRequest(User $user)
    {
        // Check if request already exists
        $existingRequest = FriendRequest::where(function($query) use ($user) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('sender_id', $user->id)
                ->where('receiver_id', auth()->id());
        })->first();

        if ($existingRequest) {
            return back()->with('error', 'Friend request already exists.');
        }

        // Check if already friends
        if (auth()->user()->friends->contains($user)) {
            return back()->with('error', 'You are already friends with this user.');
        }

        // Create new friend request
        FriendRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $user->id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Friend request sent successfully.');
    }

    public function acceptRequest(FriendRequest $request)
    {
        if ($request->receiver_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->update(['status' => 'accepted']);

        // Create friendship records for both users
        Friend::create([
            'user_id' => $request->sender_id,
            'friend_id' => $request->receiver_id
        ]);

        Friend::create([
            'user_id' => $request->receiver_id,
            'friend_id' => $request->sender_id
        ]);

        return back()->with('success', 'Friend request accepted.');
    }

    public function rejectRequest(FriendRequest $request)
    {
        if ($request->receiver_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->update(['status' => 'rejected']);

        return back()->with('success', 'Friend request rejected.');
    }

    public function cancelRequest(FriendRequest $request)
    {
        if ($request->sender_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $request->delete();

        return back()->with('success', 'Friend request cancelled.');
    }

    public function removeFriend(User $user)
    {
        // Remove friendship records for both users
        Friend::where(function($query) use ($user) {
            $query->where('user_id', auth()->id())
                ->where('friend_id', $user->id);
        })->orWhere(function($query) use ($user) {
            $query->where('user_id', $user->id)
                ->where('friend_id', auth()->id());
        })->delete();

        return back()->with('success', 'Friend removed successfully.');
    }
}

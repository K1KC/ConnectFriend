<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function thumbsup(Request $request) {

        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $userId = auth()->id();
        $friendId = $request->user_id;
        $friend = Friend::where('user_id', $userId)->where('friend_id', $friendId)->first();

        if($friend) {
            $friend->delete();
            return redirect()->back()->with('message', __('messages.thumbsup.remove'));
        } else {
            Friend::create([
                'user_id' => $userId,
                'friend_id' => $friendId,
            ]);

            Notification::create([
                'sender_id' => $userId,
                'type' => 'friend_request',
                'user_id' => $friendId,
                'message' => 'None',
                'status' => 'unread'
            ]);
            return redirect()->back()->with('message', __('messages.thumbsup.added'));
        }
    }

    public function getAllFriends() {
        $currentUserId = auth()->user()->id;
        $friendIds = DB::table('friends')->where(function ($query) use ($currentUserId) {
                $query->where('user_id', $currentUserId)
                    ->orWhere('friend_id', $currentUserId);
        })->where('status', 'accepted')->get(['user_id', 'friend_id'])->map(function ($friendship) use ($currentUserId)
        {
            return $friendship->user_id === $currentUserId ? $friendship->friend_id : $friendship->user_id;
        })->toArray();

        $friends = User::whereIn('id', $friendIds)->get();
        return view('friendlist', compact('friends'));
    }
}

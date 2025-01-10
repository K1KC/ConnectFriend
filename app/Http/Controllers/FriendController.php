<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use app\Models\Friend;
use Illuminate\Http\Request;

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
            return redirect()->back()->with('message', __('messages.thumbsup.added'));
        }
    }
}

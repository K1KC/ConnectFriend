<?php

namespace App\Http\Controllers;

use App\Models\FieldOfWork;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUserId = auth()->user()->id;

        $users = User::where('id', '!=', $currentUserId)
        ->whereNotIn('id', function($query) use ($currentUserId) {
            $query->select('friend_id')
                  ->from('friends')
                  ->where('user_id', $currentUserId)
                  ->unionAll(
                      $query->select('user_id')
                            ->from('friends')
                            ->where('friend_id', $currentUserId)
                  );
        })
        ->with('fieldsOfWork')->inRandomOrder()
        ->get();

        $wishlist = Friend::where('user_id', $currentUserId)->pluck('friend_id')->toArray();

    return view('home', compact('users', 'wishlist'));
    }
}

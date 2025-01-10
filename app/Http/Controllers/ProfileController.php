<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }

    public function topup() 
    {
        $user = auth()->user();
        $user->coins_balance += 100;
        $user->save();
        return redirect()->back();
    }

}

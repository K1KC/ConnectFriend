<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\friendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);
Route::get('/test', [RegisterController::class, 'testCreateUser']);
Route::middleware(['auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/edit-thumbs-up', [FriendController::class, 'thumbsup'])->name('edit.thumbsup');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::get('/search', function() {
        return view('search');
    })->name('search.page');
    Route::get('/friendlist', [FriendController::class, 'getAllFriends'])->name('friendlist');
});




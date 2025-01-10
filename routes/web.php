<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::middleware(['auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('locale/{lang}', [LocaleController::class, 'setLocale']);
    Route::post('/edit-thumbs-up', [FriendController::class, 'editThumbsUp'])->name('edit.thumbsup');
});




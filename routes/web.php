<?php

use App\Http\Controllers\backend\CommunityController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\frontend\FrontCommunityController;
use App\Http\Controllers\frontend\FrontPostController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome');
});

 Route::get('/community/{slug}', [FrontCommunityController::class, 'show'])->name('frontend.community.show');
  Route::get('/post/{community_slug}/{slug}', [FrontPostController::class,'show'])->name('frontend.post.show');



// Admin Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['middleware'=> 'auth', 'verified'])->prefix('/dashboard')->group(function () {
          Route::resource('community', CommunityController::class);
          Route::get('post/{slug}', [PostController::class, 'create'])->name('post.create');
          Route::resource('post', PostController::class, ['except' => 'create']);
});



require __DIR__.'/auth.php';

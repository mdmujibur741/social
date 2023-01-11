<?php

use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\CommunityController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\PostVoteController;
use App\Http\Controllers\frontend\FrontCommunityController;
use App\Http\Controllers\frontend\FrontPostController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome');
});



 Route::get('/r/{slug}', [FrontCommunityController::class, 'show'])->name('frontend.community.show');
 Route::get('/r/{community_slug}/{slug}', [FrontPostController::class,'show'])->name('frontend.post.show');
 Route::post('/r/{community_slug}/{slug}/comment', [CommentController::class,'store'])->name('frontend.comment.store');
 Route::post('/r/post/like/{slug}', [PostVoteController::class,'like'])->name('frontend.post.like');
 Route::post('/r/post/dislike/{slug}', [PostVoteController::class,'dislike'])->name('frontend.post.dislike');
 




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['middleware'=> 'auth', 'verified'])->name('backend.')->group(function () {
          Route::resource('community', CommunityController::class);
          Route::get('post/create/{slug}', [PostController::class, 'create'])->name('post.create');
          Route::resource('post', PostController::class, ['except' => 'create']);
});



require __DIR__.'/auth.php';

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
     public function store($community_slug, $slug)
     {
          $post = Post::where('slug', $slug)->first();
         $post->comments()->create([
               'user_id' => auth()->id(),
               'content' => Request::input('content')
         ]);
     }
}

<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontPostController extends Controller
{
    public function show($community_slug, $slug)
    {
        $post = new PostResource(Post::where('slug', $slug)->first());
        return Inertia::render('frontend/post/show' ,compact('community_slug','post'));
    }
}

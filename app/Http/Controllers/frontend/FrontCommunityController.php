<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontCommunityController extends Controller
{
    public function show($slug)
    {
           $community = Community::where('slug', $slug)->first();
           $posts = PostResource::collection(Post::with('users')->where('community_id', $community->id)->paginate(5));

           return Inertia::render('frontend/community/show',compact('community','posts'));
    }
}

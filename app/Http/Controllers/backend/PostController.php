<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
           
    }

    public function create($slug)
    {
        $community = Community::where('slug', $slug)->first();
        return Inertia::render('post/create',compact('community'));
    }

    public function store(PostStoreRequest $request)
    {
           Post::create([
               'user_id' => auth()->id(),
               'community_id' => $request->community_id,
               'title' => $request->title,
               'description' => $request->description,
               'url' => $request->url,
           ]);
           return Redirect::back();
    }

    public function edit(Post $post)
    {
        $community = $post->communities->slug;
        return Inertia::render('post/edit',compact('post','community'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
              $post->update([
                 'title' => $request->title,
                 'url' => $request->url,
                 'description' => $request->description,
              ]);
              return Redirect::back();
    }

    public function destroy(Post $post)
    {   
       $community = $post->communities->slug;
         $post->delete();
        // return "done";
         return Redirect::route('frontend.community.show',$community);
    }
}

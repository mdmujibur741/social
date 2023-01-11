<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostVoteController extends Controller
{
     public function like($slug)
     {
         $post= Post::where('slug', $slug)->first();
         $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();
         
         if(!is_null($isVoted)){
             if($isVoted->vote === -1){
                $isVoted->update([ 'vote' => 1]);
                $post->increment('votes', 2);
                return Redirect::back();
             }elseif($isVoted->vote==1){
               return Redirect::back();
             }
         }else{
               PostVote::create([
                   'post_id' => $post->id,
                   'user_id' => Auth::id(),
                   'vote' => 1,
               ]);
               $post->increment('votes', 1);
               return Redirect::back();
         }
     }

     public function dislike($slug)
     {
         $post = Post::where('slug', $slug)->first();
         $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();

        if(!is_null($isVoted)){
              if($isVoted->vote === 1){
                $isVoted->update([ 'vote' => -1]);
                  $post->decrement('votes', 1);
              }elseif($isVoted->vote === -1){
                   return Redirect::back();
              }
        }else{
                PostVote::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::id(),
                    'vote' => -1,
                ]);
                $post->decrement('votes', 1);
                  return Redirect::back();
        }
     }
}

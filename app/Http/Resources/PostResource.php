<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'title' => $this->title,
                'description' => $this->description,
                 'users' => new UserResource($this->whenLoaded('users')),
                 'username' => $this->users->name,
                'slug' => $this->slug,   
                'url' => $this->url,  
                'votes' => $this->votes,
                'owner' => auth()->id() == $this->user_id ? true :false,
                'comments' => CommentResource::collection($this->whenLoaded('comments')),
                'postVotes' => $this->whenLoaded('postVotes'),
        ];
    }
}

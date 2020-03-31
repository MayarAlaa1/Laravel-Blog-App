<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=> $this->user_id,
            'title' => $this->title,
            'description' => $this->description,
            // 'user_info' => [
            //     'id' => $this->user ? $this->user->id : 'not exist',
            // law this-> user mawgod hat meno el id 
            //     'name' => $this->user ? $this->user->name : 'not exist',
            //     'email' => $this->user ? $this->user->email : 'not exist'
            // ]
            'user_info' => new UserResource($this->user)
            // de keda 3ashan ab3at hagat el user howa already mawgod w keda ana ba3ta el user object
        ];
    }
}

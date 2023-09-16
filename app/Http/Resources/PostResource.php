<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            'image'=>asset($this->image_path),
            'created_by'=>$this->user->name,
            'categories'=>CategoryResource::collection($this->categories),
            'created_at'=>$this->created_at->diffForHumans(),

        ];
    }
}

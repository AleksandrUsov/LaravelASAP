<?php

namespace App\Http\Resources;

use App\Enums\ErrorEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public static $wrap = 'post';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'author' => new UserResource($this->user),
            'category' => new CategoryResource($this->category),
            'images' => ImageResource::collection($this->images)
        ];
    }
}

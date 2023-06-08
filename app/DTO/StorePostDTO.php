<?php

namespace App\DTO;

use App\Http\Requests\PostRequest;

class StorePostDTO
{
    public function __construct(
        readonly string $title,
        readonly string $content,
    )
    {
    }

    public static function fromRequest(PostRequest $request): self {
        return new self(
            title: $request->get('title'),
            content: $request->get('content'),
        );
    }
    public function toArray()
    {
        return [];
    }
}

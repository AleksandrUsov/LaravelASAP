<?php

namespace App\Http\Controllers\Api;

use App\Enums\ErrorEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index()
    {
        try {
            return PostResource::collection(Post::query()->paginate(10));
        } catch (\Exception $exception) {
            Log::critical($exception->getMessage());
            return response([
                'success' => false,
                'message' => ErrorEnum::UNKNOWN->value
            ]);
        }

    }

    public function show(Post $post)
    {
        try {
            return new PostResource($post);
        } catch (\Exception $exception) {
            Log::critical($exception->getMessage());
            return \response([
                'success' => false,
                'message' => ErrorEnum::UNKNOWN->value
            ]);
        }
    }
}

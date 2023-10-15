<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Post\StoreRequest;
use App\Http\Requests\API\Post\UpdateOrCreateRequest;
use App\Http\Requests\API\Post\UpdateRequest;
use App\Models\Post;
use http\Env\Request;

class PostController extends Controller
{
    public function list()
    {
        return Post::query()
            ->select(['id', 'title', 'image', 'created_at'])
            ->where('is_published', true)
            ->get();
    }

    public function post(Post $post)
    {
        return $post;
    }

    public function store(StoreRequest $request)
    {
        $post = Post::query()->create($request->validated());

        return response()->json($post, 201);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function updateOrCreate(UpdateOrCreateRequest $request, $post)
    {
        return Post::query()->updateOrCreate(['id' => $post], $request->validated());
    }

    public function delete(Post $post)
    {
        $post->delete();
        return response([
            "message" => "deleted"
        ]);
    }
}

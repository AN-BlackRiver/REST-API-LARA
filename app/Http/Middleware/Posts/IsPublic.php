<?php

namespace App\Http\Middleware\Posts;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class IsPublic
{

    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var Post $post
         */

        $post = $request->route('post');

        if (!$post->isPublic()) {
            if (str_contains($request->route()->getPrefix(), 'api')) {
                return \response()->json(['message' => 'no access'], 403);
            };

            return abort(403);
        }
        return $next($request);
    }
}

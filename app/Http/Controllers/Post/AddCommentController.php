<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class AddCommentController extends Controller
{
    public function __invoke(StoreCommentRequest $request, Post $post)
    {
        $data = $request->validated();

        $post->comments()->create($data);

        return redirect(route('post.show', $post));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->paginate(5);

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $newThubmnail = Storage::disk('public')->put('/posts', $data['thumbnail']);
        $data['thumbnail'] = str_replace("posts/", "", $newThubmnail);

        Post::create($data);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        if ($data['thumbnail']) {
            $newThubmnail = Storage::disk('public')->put('/posts', $data['thumbnail']);

            if ($newThubmnail) {
                Storage::disk('public')->delete('/posts/' . $post->thumbnail);
                $data['thumbnail'] = str_replace("posts/", "", $newThubmnail);
            }
        }

        $post->update($data);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}

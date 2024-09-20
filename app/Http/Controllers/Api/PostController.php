<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::all());
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->only(
            'title',
            'story',
        ));

        return response()->json([
            'status' => true,
            'message' => 'Successfully created new post',
        ]);
    }

    public function show(Post $post)
    {
       return $post;
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->only(
            'title',
            'story',
        ));

        return response()->json([
            'status' => true,
            'message' => 'Successfully updated post details',
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post has been deleted',
        ]);
    }
}

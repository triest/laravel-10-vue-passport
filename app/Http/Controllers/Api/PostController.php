<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\IndexPostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Service\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public PostService $postService;

    /**
     * @param PostService $postService
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index(IndexPostRequest $request)
    {
        $posts = $this->postService($request->validated());

        return PostCollection::make($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $post = $this->postService->store($request->validated());

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return PostResource::make($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->postService->update();


        return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\BulkTagRequest;
use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\IndexTagRequest;
use App\Http\Resources\Tag\TagCollection;
use App\Http\Resources\Tag\TagResource;
use App\Models\Post;
use App\Models\Tag;
use App\Service\PostService;
use App\Service\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public TagService $tagService;

    /**
     * @param PostService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(IndexTagRequest $request)
    {
        $tags = $this->tagService->index($request);

        return TagCollection::make($tags);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        $tag = $this->tagService->store($request->validated());

        return TagResource::make($tag);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return TagResource::make($tag);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag = $this->tagService->update($tag,$request->validated());

        return TagResource::make($tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $this->tagService->delete($tag);
    }


}

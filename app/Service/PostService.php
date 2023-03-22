<?php

namespace App\Service;

use App\Models\Post;

class PostService
{

    public function index(){

    }


    public function view(Post $post){
        return $post;
    }

    public function store($data){

        $post = Post::create($data);

        return $post;

    }

    public function update(Post $post,$data){

        $post->update($data);

        return $post;
    }

    public function delete(Post $post){

        $post->delete();
    }
}

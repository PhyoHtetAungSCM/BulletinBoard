<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    public function getPostList();

    public function getUpdatePost($id);

    public function createPost($request);

    public function searchPost($keyword);

    public function updatePost($request, $id);

    public function deletePost($request);
}

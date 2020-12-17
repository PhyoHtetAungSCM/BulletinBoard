<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
  public function getPostList();

  public function searchPost($keyword);

  public function getUpdatePost($id);

  public function createPost($request);
}

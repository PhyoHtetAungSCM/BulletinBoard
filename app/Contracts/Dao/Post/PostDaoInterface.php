<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
  public function getPostList();

  public function searchPost($keyword);

  public function getUpdatePost($id);

  public function createPost($request);
}

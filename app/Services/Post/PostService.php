<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }

  public function getPostList()
  {
    return $this->postDao->getPostList();
  }

  public function getUpdatePost($id)
  {
    return $this->postDao->getUpdatePost($id);
  }

  public function createPost($request)
  {
    return $this->postDao->createPost($request);
  }

  public function searchPost($keyword)
  {
    return $this->postDao->searchPost($keyword);
  }

  public function updatePost($request, $id)
  {
    return $this->postDao->updatePost($request, $id);
  }

  public function deletePost($request)
  {
    return $this->postDao->deletePost($request);
  }
}

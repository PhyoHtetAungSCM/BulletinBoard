<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;

/**
 * System Name: Bulletinboard
 * Module Name: Post Service
 */
class PostService implements PostServiceInterface
{
  private $postDao;

  /**
   * Class Constructor
   * 
   * @param OperatorPostDaoInterface
   * @return
   */
  public function __construct(PostDaoInterface $postDao)
  {
    $this->postDao = $postDao;
  }
  
  /**
   * Get Post List
   * 
   * @return postDao's getPostList function
   */
  public function getPostList()
  {
    return $this->postDao->getPostList();
  }

  /**
   * Get Update Post
   * 
   * @param $id
   * @return postDao's getUpdatePost function
   */
  public function getUpdatePost($id)
  {
    return $this->postDao->getUpdatePost($id);
  }

  /**
   * Create Post
   * 
   * @param $request
   * @return postDao's createPost function
   */
  public function createPost($request)
  {
    return $this->postDao->createPost($request);
  }

  /**
   * Search Post
   * 
   * @param $keyword
   * @return postDao's searchPost function
   */
  public function searchPost($keyword)
  {
    return $this->postDao->searchPost($keyword);
  }

  /**
   * Update Post
   * 
   * @param $request
   * @param $id
   * @return postDao's updatePost function
   */
  public function updatePost($request, $id)
  {
    return $this->postDao->updatePost($request, $id);
  }

  /**
   * Delete Post
   * 
   * @param $request
   * @return postDao's deletePost function
   */
  public function deletePost($request)
  {
    return $this->postDao->deletePost($request);
  }
}
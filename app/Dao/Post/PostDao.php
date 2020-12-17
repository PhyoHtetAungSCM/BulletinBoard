<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Post;

class PostDao implements PostDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */

  public function getPostList()
  {
    $postList = Post::paginate(5);
    return $postList;
  }

  public function getUpdatePost($id)
  {
    $post = Post::find($id);
    return $post;
  }

  public function createPost($request)
  {
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->create_user_id = 1;
    $post->updated_user_id = 1;
    $post->deleted_user_id = 1;
    return $post->save();
  }

  public function searchPost($keyword)
  {
    $postList = Post::where('title', 'like', "%{$keyword->search}%")
                  ->orWhere('description', 'like', "%{$keyword->search}%")
                  ->paginate(5);
    return $postList;
  }

  public function updatePost($request, $id)
  {
    $updatedPost = Post::find($id);
    $updatedPost->title = $request->title;
    $updatedPost->description = $request->description;
    return $updatedPost->save();
  }
}

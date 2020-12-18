<?php

namespace App\Dao\Post;

use Illuminate\Support\Facades\Auth;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Post;
use App\User;

class PostDao implements PostDaoInterface
{
  /**
   * Get Operator List
   * @param Object
   * @return $operatorList
   */

  public function getPostList()
  {
    $postList = Post::where('status', 1)->paginate(5);
    return $postList;
  }

  public function getUpdatePost($id)
  {
    $post = Post::find($id);
    return $post;
  }

  public function createPost($request)
  {
    $authId = Auth::id();
    $post = new Post();
    $post->title = $request->title;
    $post->description = $request->description;
    $post->create_user_id = $authId;
    $post->updated_user_id = $authId;
    $post->deleted_user_id = $authId;
    return $post->save();
  }

  public function searchPost($keyword)
  {
    $postList = Post::where('status', 1)
                    ->join('users','users.id','=','posts.create_user_id')
                    ->where(function ($query) use ($keyword) {
                      $query->where('title', 'like', "%{$keyword->search}%");
                      $query->orWhere('description', 'like', "%{$keyword->search}%");
                      $query->orWhere('name', 'like', "%{$keyword->search}%");
                  })->paginate(5);
    return $postList;
  }

  public function updatePost($request, $id)
  {
    $updatePost = Post::find($id);
    $updatePost->title = $request->title;
    $updatePost->description = $request->description;
    return $updatePost->save();
  }

  public function deletePost($request)
  {
    $deletePost = Post::find($request->input('deletePostId'));
    $deletePost->status = 0;
    return $deletePost->save();
  }
}

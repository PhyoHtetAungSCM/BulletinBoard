<?php

namespace App\Dao\Post;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    $post->created_at = Carbon::now();
    $post->updated_at = Carbon::now();
    return $post->save();
  }

  public function searchPost($keyword)
  {
    $postList = Post::where('posts.status', 1)
                    ->whereHas('user', function ($query) use ($keyword) {
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
    if($request->status === "1") {
        $updatePost->status = 1;
    } else {
        $updatePost->status = 0;
    }
    return $updatePost->save();
  }

  public function deletePost($request)
  {
    $deletePost = Post::find($request->input('deletePostId'));
    $deletePost->status = 0;
    $deletePost->deleted_user_id = Auth::id();
    $deletePost->deleted_at = Carbon::now();
    return $deletePost->save();
  }
}

<?php

namespace App\Dao\Post;

use Illuminate\Support\Facades\Auth;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Post;
use Carbon\Carbon;

/**
 * System Name: Bulletinboard
 * Module Name: Post Dao
 */
class PostDao implements PostDaoInterface
{
    /**
     * Get Post List
     * 
     * @return post list ($postList)
     */
    public function getPostList()
    {
        $postList = Post::where('status', 1)->paginate(5);
        return $postList;
    }

    /**
     * Get Update Post
     * 
     * @param $id
     * @return updated post ($post)
     */
    public function getUpdatePost($id)
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * Create Post
     * 
     * @param $request
     * @return saved post response
     */
    public function createPost($request)
    {
        /** Retrieve data from session */
        $title = session()->get('post')['title'];
        $description = session()->get('post')['description'];

        /** Save data into database */
        $post = new Post();
        $post->title = $title;
        $post->description = $description;
        $post->create_user_id = Auth::id();
        $post->updated_user_id = Auth::id();
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        return $post->save();

        /** Remove Session */
        session()->forget('post');
    }

    /**
     * Search Post
     * 
     * @param $keyword
     * @return search result ($postList)
     */
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

    /**
     * Update Post
     * 
     * @param $request
     * @param $id
     * @return updated post response
     */
    public function updatePost($request, $id)
    {
        $update = session()->get('update-post');
        /** Retrieve data from session */
        $title = $update['title'];
        $description = $update['description'];

        /** Save data into database */
        $updatePost = Post::find($id);
        $updatePost->title = $title;
        $updatePost->description = $description;
        if($request->status) {
            $updatePost->status = 1;
        } else {
            $updatePost->status = 0;
        }
        $updatePost->updated_user_id = Auth::id();
        $updatePost->updated_at = Carbon::now();
        return $updatePost->save();

        /** Remove Session */
        session()->forget('post');
    }

    /**
     * Delete Post
     * 
     * @param $request
     * @return deleted post response
     */
    public function deletePost($request)
    {
        $deletePost = Post::find($request->input('deletePostId'));
        $deletePost->status = 0;
        $deletePost->deleted_user_id = Auth::id();
        $deletePost->deleted_at = Carbon::now();
        return $deletePost->save();
    }
}
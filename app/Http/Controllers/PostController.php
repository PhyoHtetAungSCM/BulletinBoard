<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postInterface;

    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct(PostServiceInterface $postInterface)
    {
        // $this->middleware('auth');
        $this->postInterface = $postInterface;
    }

    public function index() {
        $postList = $this->postInterface->getPostList();
        return view('post/post-list', [
            'postList' => $postList
        ]);
    }

    public function postDetail() {
        return view('post/post-detail');
    }

    public function getCreatePost() {
        return view('post/create-post');
    }

    public function getUpdatePost($id) {
        $post = $this->postInterface->getUpdatePost($id);
        return view('post/update-post', [
            'post' => $post
        ]);
    }

    public function getUploadPost() {
        return view('post/upload-post');
    }

    public function createPost(Request $request) {
        $this->postInterface->createPost($request);
        return redirect()->route('post.index');
    }

    public function searchPost(Request $keyword) {
        $postList = $this->postInterface->searchPost($keyword);
        return view('post/post-list', [
            'postList' => $postList
        ]);
    }

    public function updatePost(Request $request, $id) {
        $postList = $this->postInterface->updatePost($request, $id);
        return redirect()->route('post.index');
    }

    public function deletePost(Request $request) {
        $postList = $this->postInterface->deletePost($request);
        return redirect()->route('post.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('post/post_list', [
            'postList' => $postList
        ]);
    }

    public function getCreatePost() {
        return view('post/create_post');
    }

    public function getUpdatePost($id) {
        $post = $this->postInterface->getUpdatePost($id);
        return view('post/update_post', [
            'post' => $post
        ]);
    }

    public function getUploadPost() {
        return view('post/upload_post');
    }

    public function createPost(Request $request) {
        $rules = [
            'title' => 'required|string|max:255|unique:posts',
            'description'   => 'required|string'
        ];
        $this->validate($request, $rules);

        $this->postInterface->createPost($request);

        return redirect()->back()->withSuccess('Create Post Successfully');
    }

    public function searchPost(Request $keyword) {
        $postList = $this->postInterface->searchPost($keyword);
        return view('post/post_list', [
            'postList' => $postList
        ]);
    }

    public function updatePost(Request $request, $id) {
        $rules = [
            'title' => 'required|string|max:255|unique:posts',
            'description'   => 'required|string',
            'status' => 'required|string'
        ];
        $this->validate($request, $rules);

        $postList = $this->postInterface->updatePost($request, $id);
        
        return redirect()->route('post.index');
    }

    public function deletePost(Request $request) {
        $postList = $this->postInterface->deletePost($request);
        return redirect()->route('post.index');
    }

    public function csvExport() {
        return Excel::download(new CsvExport, 'SCMBulletinBoard.csv');
    }

    public function csvImport(Request $request) {
        Excel::import(new CsvImport, $request->file('file'));
        return back();
    }
}

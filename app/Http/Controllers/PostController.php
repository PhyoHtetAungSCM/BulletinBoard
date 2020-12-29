<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use App\Exports\CsvExport;
use App\Imports\CsvImport;

/**
 * System Name: Bulletinboard
 * Module Name: Post Screen
 */
class PostController extends Controller
{
    /** Post Interface */
    private $postInterface;

    /**
    * Create A New Controller Instance.
    *
    * @return void
    */
    public function __construct(PostServiceInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    /**
     * Get Post List
     * 
     * @return IlluminateHttpResponse with postList
     */
    public function index() 
    {
        $postList = $this->postInterface->getPostList();
        return view('post/post_list', [
            'postList' => $postList
        ]);
    }

    /**
     * Get Create Post Screen
     * 
     * @return IlluminateHttpResponse
     */
    public function getCreatePost() 
    {
        return view('post/create_post');
    }

    /**
     * Get Update Post Screen
     * 
     * @return IlluminateHttpResponse with post
     */
    public function getUpdatePost($id) 
    {
        $post = $this->postInterface->getUpdatePost($id);
        return view('post/update_post', [
            'post' => $post
        ]);
    }

    /**
     * Get Upload Post Screen
     * 
     * @return IlluminateHttpResponse
     */
    public function getUploadPost() 
    {
        return view('post/upload_post');
    }

    /**
     * Create Post
     * 
     * @param Request $request
     * @return IlluminateHttpResponse with success message
     */
    public function createPost(Request $request) 
    {
        $result = $this->postInterface->createPost($request);
        return redirect()->route('post.index');
    }

    /**
     * Create Post Confirm
     * 
     * @param Request $request
     * @return IlluminateHttpResponse with post
     */
    public function createPostConfirm(Request $request) 
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'description'   => 'required|string'
        ]);

        $request->flash();
        session()->put('post', ['title' => $request->title, 'description' => $request->description]);

        return view('post/create_post_confirm', [
            'post' => $request
        ]);
    }

    /**
     * Search Post
     * 
     * @param Request $keyword
     * @return IlluminateHttpResponse with postList
     */
    public function searchPost(Request $keyword) 
    {
        $postList = $this->postInterface->searchPost($keyword);
        return view('post/post_list', [
            'postList' => $postList
        ]);
    }

    /**
     * Update Post
     * 
     * @param Request $request
     * @param $id
     * @return IlluminateHttpResponse
     */
    public function updatePost(Request $request, $id) 
    {
        $result = $this->postInterface->updatePost($request, $id);
        return redirect()->route('post.index');
    }

    /**
     * Update Post Confirm
     * 
     * @param Request $request
     * @return IlluminateHttpResponse with post
     */
    public function updatePostConfirm(Request $request, $id) 
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,'.$id,
            'description'   => 'required|string'
        ]);

        $request->flash();
        session()->put('update-post', [
            'id' => $id, 
            'title' => $request->title, 
            'description' => $request->description
        ]);

        return view('post/update_post_confirm', [
            'id' => $id,
            'post' => $request
        ]);
    }   

    /**
     * Delete Post
     * 
     * @param Request $request
     * @return IlluminateHttpResponse
     */
    public function deletePost(Request $request) 
    {
        $result = $this->postInterface->deletePost($request);
        return redirect()->route('post.index');
    }

    /**
     * CSV Export
     * 
     * @return SCMBulletinBoard.csv
     */
    public function csvExport() 
    {
        return Excel::download(new CsvExport, 'SCMBulletinBoard.csv');
    }

    /**
     * CSV Import
     * 
     * @return IlluminateHttpResponse
     */
    public function csvImport(Request $request) 
    {
        $request->session()->forget('failures');
        $authId = Auth::id();
        $fileName = $request->file->getClientOriginalName();
        $file = $request->file('file')->store($authId.'/csv/'.$fileName);

        $import = new CsvImport;
        $import->import($file);
        
        if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        } else {
            return redirect()->route('post.index');
        }   
    }
}
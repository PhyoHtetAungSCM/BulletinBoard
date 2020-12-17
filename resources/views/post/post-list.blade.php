@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold">
                    Post List
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('post.searchPost') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-3 col-md-12 col-sm-12 p-1">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <button type="submit" class="btn btn-primary btn-block" value="search">Search</button>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <a href="{{ route('post.getCreatePost') }}" type="button" class="btn btn-primary btn-block">Add</a>
                            </div>
                            <div class="col-lg-2 col-md-6 col-sm-12 p-1">
                                <a href="{{ route('post.getUploadPost') }}" type="button" class="btn btn-primary btn-block">Upload</a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 p-1">
                                <button type="button" class="btn btn-primary btn-block">Download</button>
                            </div>
                        </div>
                    </form>
                    <!-- Post List -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Post Title</th>
                                <th scope="col">Post Description</th>
                                <th scope="col">Posted User</th>
                                <th scope="col">Posted Date</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($postList as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>##comming soon##</td>
                                    <td>{{$post->created_at}}</td>
                                    <td><a href="{{ route('post.getUpdatePost', ['id' => $post->id]) }}">Edit</a></td>
                                    <td><a href="#">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {!! $postList->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
